<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // We'll create this view later
    }

    public function addWebsiteForm()
    {
        // Fetch categories to populate the categories dropdown
        $categories = Category::where('status', 1)->get(); // Fetch only active categories
        // dd($categories);
        return view('admin.add-website', compact('categories'));
    }

    /**
     * Handle form submission to add a new website.
     */
    public function addWebsite(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:websites,url',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'monthly_traffic' => 'nullable|integer|min:0',
            'domain_rating' => 'nullable|integer|min:0|max:100',
            'domain_authority' => 'nullable|integer|min:0|max:100',
            'spam_score' => 'nullable|numeric|min:0|max:100',
            'turnaround_time' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'language' => 'nullable|string|max:255',
            'quality_score' => 'nullable|integer|min:1|max:5',
            'max_dofollow_links' => 'nullable|integer|min:0',
            'content_guidelines' => 'nullable|string',
            'minimum_word_count' => 'nullable|integer|min:0',
            'allowed_link_types' => 'nullable|array',
            'allowed_link_types.*' => 'in:do-follow,no-follow',
            'payment_methods' => 'nullable|array',
            'payment_methods.*' => 'string',
            'status' => 'required|boolean',
        ]);

        // Generate masked URL (first 3 characters + *)
        // $maskedUrl = substr($validated['url'], 0, 3) . str_repeat('*', strlen($validated['url']) - 3);
        $domain = parse_url($validated['url'], PHP_URL_HOST); // Extract domain name (e.g., "example.com")
        $domainWithoutWww = preg_replace('/^www\./', '', $domain); // Remove "www" prefix if present
        $maskedUrl = substr($domainWithoutWww, 0, 3) . str_repeat('*', strlen($domainWithoutWww) - 3);


        // Store the website in the database
        $website = Website::create([
            'user_id' => Auth::id(), // Assuming the logged-in admin is adding the website
            'name' => $validated['name'],
            'url' => $validated['url'],
            'masked_url' => $maskedUrl,
            // 'category_id' => $validated['category_id'],
            'monthly_traffic' => $validated['monthly_traffic'],
            'domain_rating' => $validated['domain_rating'],
            'domain_authority' => $validated['domain_authority'],
            'spam_score' => $validated['spam_score'],
            'turnaround_time' => $validated['turnaround_time'],
            'price' => $validated['price'],
            'language' => $validated['language'],
            'quality_score' => $validated['quality_score'],
            'max_dofollow_links' => $validated['max_dofollow_links'],
            'content_guidelines' => $validated['content_guidelines'],
            'minimum_word_count' => $validated['minimum_word_count'],
            'allowed_link_types' => $validated['allowed_link_types'] ?? [], // Remove json_encode
            'payment_methods' => $validated['payment_methods'] ?? [],       // Remove json_encode
            'status' => $validated['status'],
            'is_pending_approval' => 0, // Admin-added websites are not pending approval
        ]);

        // Attach categories to the website (update the pivot table)
        $website->categories()->sync($validated['categories']);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Website added successfully!');
    }

    public function viewWebsites()
    {
        // $websites = Website::with('categories')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);

        // return view('admin.view-websites', compact('websites'));
        $categories = Category::where('status', 1)->get();
        $metaTitle = "Websites Listing - Admin Dashboard";
        return view('admin.view-websites', compact('metaTitle', 'categories'));
    }

    public function getWebsites(Request $request)
    {
        try {
            $query = Website::with('categories');

            // Search functionality
            if ($request->filled('search')) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', "%{$request->search}%")
                        ->orWhere('url', 'like', "%{$request->search}%");
                });
            }

            // Category filtering
            if ($request->filled('categories') && $request->categories !== 'null') {
                $categories = array_filter(explode(',', $request->categories));
                if (!empty($categories)) {
                    $query->whereHas('categories', function ($q) use ($categories) {
                        $q->whereIn('categories.id', $categories);
                    });
                }
            }

            // Traffic range filtering
            if ($request->filled('trafficRange') && $request->trafficRange !== 'null') {
                $range = json_decode($request->trafficRange);
                if ($range && isset($range->min)) {
                    $query->where('monthly_traffic', '>=', $range->min);
                }
                if ($range && isset($range->max)) {
                    $query->where('monthly_traffic', '<=', $range->max);
                }
            }

            // DR range filtering
            if ($request->filled('drRange') && $request->drRange !== 'null') {
                $range = json_decode($request->drRange);
                if ($range && isset($range->min)) {
                    $query->where('domain_rating', '>=', $range->min);
                }
                if ($range && isset($range->max)) {
                    $query->where('domain_rating', '<=', $range->max);
                }
            }

            // DA range filtering (new)
            if ($request->filled('daRange') && $request->daRange !== 'null') {
                $range = json_decode($request->daRange);
                if ($range && isset($range->min)) {
                    $query->where('domain_authority', '>=', $range->min);
                }
                if ($range && isset($range->max)) {
                    $query->where('domain_authority', '<=', $range->max);
                }
            }

            // Price range filtering
            if ($request->filled('priceRange') && $request->priceRange !== 'null') {
                $range = json_decode($request->priceRange);
                if ($range && isset($range->min)) {
                    $query->where('price', '>=', $range->min);
                }
                if ($range && isset($range->max)) {
                    $query->where('price', '<=', $range->max);
                }
            }

            // Order by latest
            $query->latest();

            $websites = $query->paginate(10);

            return response()->json([
                'success' => true,
                'websites' => $websites,
                'message' => 'Websites retrieved successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching websites: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching websites',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function showWebsiteDetails($id)
    {
        return view('admin.website-details');
    }

    public function getWebsiteDetails($id)
    {
        $website = Website::with('categories')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $website
        ]);
    }
}
