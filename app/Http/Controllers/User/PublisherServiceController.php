<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublisherOrder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PublisherServiceController extends Controller
{
    public function newPublisherOrders()
    {
        // Get the current authenticated user
        $user = Auth::user();

        // Fetch orders where the user is either `ordered_by` or `ordered_to`
        $orders = PublisherOrder::where('ordered_by', $user->id)
            ->orWhere('ordered_to', $user->id)
            ->where('status', 'pending') // Optional: Filter only pending orders
            ->get();
        // dd($orders);
        return view("user.publisher-new-orders", compact('orders'));
    }

    //API endpoints
    public function getNewPublisherOrders()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Fetch the orders with the required fields and join with the websites table
        $orders = PublisherOrder::select(
            'publisher_orders.id',
            'websites.name as site_name',
            'websites.url as site_url',
            'publisher_orders.requested_url',
            'publisher_orders.link_text',
            'publisher_orders.price',
            'publisher_orders.status',
            'publisher_orders.notes',
            'publisher_orders.created_at'
        )
            ->join('websites', 'publisher_orders.site_id', '=', 'websites.id')
            ->where('publisher_orders.ordered_to', $userId)
            ->where('publisher_orders.status', 'pending') // Optional: Show only pending orders
            ->get();

        // Format the created_at field
        $orders->transform(function ($order) {
            $order->created_at = Carbon::parse($order->created_at)->format('d-m-Y H:i'); // Day-Month-Year and 24-hour time
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
}
