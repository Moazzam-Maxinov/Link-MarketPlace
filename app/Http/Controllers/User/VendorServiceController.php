<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Website;
use App\Models\Category;
use App\Models\PublisherOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VendorServiceController extends Controller
{
    public function allWebsites1()
    {
        return View('user.all-websites');
    }

    public function allWebsites()
    {
        $categories = Category::select('id', 'name')
            ->where('status', '1')
            ->orderBy('name')
            ->get();

        return View('user.all-websites', [
            'initialCategories' => $categories
        ]);
    }

    public function buyLink(Request $request)
    {
        // Get the website ID from the query parameter
        $websiteId = $request->query('site');

        // Retrieve the website data based on the website ID
        $website = Website::with('categories')->findOrFail($websiteId);

        if (!$website) {
            return redirect()->back()->with('error', 'Website not found.');
        }

        // Pass website details to the view
        return view('user.buy-link', [
            'website' => $website,
        ]);
    }
    // Handle the form submission and insert data into publisher_orders table
    public function placeOrder(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'requested_url' => 'required|url',
            'link_text' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'website_id' => 'required|exists:websites,id',
        ]);

        // Get the current logged-in user's ID
        $orderedBy = auth()->id();

        // Get the website details
        $website = Website::find($request->website_id);

        if (!$website) {
            return redirect()->back()->with('error', 'Website not found.');
        }

        // Insert the new order into the publisher_orders table
        $order = PublisherOrder::create([
            'ordered_by' => $orderedBy,
            'ordered_to' => $website->user_id,
            'site_id' => $website->id,
            'requested_url' => $request->requested_url,
            'link_text' => $request->link_text,
            'price' => $website->price, // You may need to adjust depending on the website data
            'notes' => $request->notes,
            'status' => 'pending', // Default status
        ]);

        // Redirect or return a response
        // Redirect to the order confirmation page with the order ID
        return redirect()->route('user.order-confirmation', ['orderId' => $order->id]);
    }

    public function orderConfirmation(Request $request)
    {
        $orderId = $request->query('orderId');

        if (!$orderId) {
            abort(404, 'Order ID not provided.');
        }

        $order = PublisherOrder::with('site')->findOrFail($orderId);

        return view('user.order-confirmation', compact('order'));
    }

    public function allVendorOrders()
    {
        return view("user.vendor-all-orders");
    }

    public function reviewOrder(Request $request)
    {
        $orderId = $request->query('orderId');

        if (!$orderId) {
            abort(404, 'Order ID not provided.');
        }

        $order = PublisherOrder::with('site')->findOrFail($orderId);

        // dd($order);

        return view('user.review-order-vendor', compact('order'));
    }

    //API Routes
    // public function getAllWebsites(Request $request)
    // {
    //     $query = Website::with('categories');

    //     // Handle pagination
    //     $perPage = $request->input('perPage', 10);
    //     $page = $request->input('page', 1);

    //     // Get total count for pagination
    //     $totalCount = $query->count();

    //     // Get paginated results
    //     $websites = $query->skip(($page - 1) * $perPage)
    //         ->take($perPage)
    //         ->get()
    //         ->map(function ($website) {
    //             return [
    //                 'id' => $website->id,
    //                 'name' => $website->name,
    //                 'masked_url' => $website->masked_url,
    //                 'monthly_traffic' => $website->monthly_traffic,
    //                 'domain_authority' => $website->domain_authority,
    //                 'domain_rating' => $website->domain_rating,
    //                 'price' => $website->price,
    //                 'allowed_link_types' => $website->allowed_link_types,
    //                 'categories' => $website->categories->map(function ($category) {
    //                     return [
    //                         'id' => $category->id,
    //                         'name' => $category->name
    //                     ];
    //                 })
    //             ];
    //         });

    //     return response()->json([
    //         'data' => $websites,
    //         'meta' => [
    //             'total' => $totalCount,
    //             'page' => $page,
    //             'perPage' => $perPage,
    //             'lastPage' => ceil($totalCount / $perPage)
    //         ]
    //     ]);
    // }

    public function getAllVendorOrders()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Fetch the orders with the required fields and join with the websites table
        $orders = PublisherOrder::select(
            'publisher_orders.id',
            'websites.masked_url as site_url',
            'publisher_orders.requested_url',
            'publisher_orders.link_text',
            'publisher_orders.price',
            'publisher_orders.status',
            'publisher_orders.notes',
            'publisher_orders.created_at'
        )
            ->join('websites', 'publisher_orders.site_id', '=', 'websites.id')
            ->where('publisher_orders.ordered_by', $userId)
            ->get();

        // Format the created_at field
        $orders->transform(function ($order) {
            $order->created_at = Carbon::parse($order->created_at)->format('d-m-Y'); // Day-Month-Year and 24-hour time
            return $order;
        });
        // dd($orders);
        // Return the orders as a JSON response
        return response()->json($orders);

        /*
        //Output Json
        [
            {
                "id": 1,                        // The ID of the publisher order
                "site_name": "Example Site",    // The name of the site from the websites table
                "site_url": "https://example.com", // The URL of the site from the websites table
                "requested_url": "https://target.com/page", // The requested URL for the link
                "link_text": "Example Link",    // The text for the hyperlink
                "price": "100.00",             // The price of the order
                "status": "pending",           // The status of the order
                "notes": "Please follow guidelines", // Additional notes for the order
                "created_at": "2025-01-16 12:34:56" // The creation timestamp of the order
            },
            {
                "id": 2,
                "site_name": "Another Site",
                "site_url": "https://another.com",
                "requested_url": "https://target.com/blog",
                "link_text": "Another Link",
                "price": "150.00",
                "status": "pending",
                "notes": null,
                "created_at": "2025-01-15 10:22:33"
            }
        ]
        */
    }

    public function getAllCategories()
    {
        $categories = Category::select('id', 'name')
            ->where('status', '1')
            ->orderBy('name')
            ->get();

        return response()->json($categories);
    }

    public function getAllWebsites(Request $request)
    {
        $query = Website::with('categories');

        // Apply filters
        if ($request->has('filters')) {
            $filters = $request->filters;

            // Category filter
            if (!empty($filters['categories'])) {
                $query->whereHas('categories', function ($q) use ($filters) {
                    $q->whereIn('categories.id', $filters['categories']);
                });
            }

            // Traffic filter
            if (isset($filters['traffic'])) {
                $query->whereBetween('monthly_traffic', [
                    $filters['traffic']['min'],
                    $filters['traffic']['max']
                ]);
            }

            // DA filter
            if (isset($filters['da'])) {
                $query->whereBetween('domain_authority', [
                    $filters['da']['min'],
                    $filters['da']['max']
                ]);
            }

            // DR filter
            if (isset($filters['dr'])) {
                $query->whereBetween('domain_rating', [
                    $filters['dr']['min'],
                    $filters['dr']['max']
                ]);
            }

            // Price filter
            if (isset($filters['price'])) {
                $query->whereBetween('price', [
                    $filters['price']['min'],
                    $filters['price']['max']
                ]);
            }
        }

        // Handle pagination
        $perPage = $request->input('perPage', 10);
        $page = $request->input('page', 1);

        // Get total count for pagination
        $totalCount = $query->count();

        // Get paginated results
        $websites = $query->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get()
            ->map(function ($website) {
                return [
                    'id' => $website->id,
                    // 'name' => $website->name,
                    'masked_url' => $website->masked_url,
                    'monthly_traffic' => $website->monthly_traffic,
                    'domain_authority' => $website->domain_authority,
                    'domain_rating' => $website->domain_rating,
                    'price' => $website->price,
                    'allowed_link_types' => $website->allowed_link_types,
                    'categories' => $website->categories->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name
                        ];
                    })
                ];
            });

        return response()->json([
            'data' => $websites,
            'meta' => [
                'total' => $totalCount,
                'page' => $page,
                'perPage' => $perPage,
                'lastPage' => ceil($totalCount / $perPage)
            ]
        ]);
    }
}
