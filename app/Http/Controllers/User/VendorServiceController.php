<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Website;
use App\Models\Category;
use Illuminate\Http\Request;

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
                    'name' => $website->name,
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
