@extends('layouts.user.user')

@section('content')
    @viteReactRefresh
    @vite('resources/js/components/user/PublisherNewOrders.jsx')
    <div id="publisher-new-orders" class="px-6"></div>
    {{-- <h1>New Publisher Orders</h1>
    @if ($orders->isEmpty())
        <p>No new orders available.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Requested URL</th>
                    <th>Link Text</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->requested_url }}</td>
                        <td>{{ $order->link_text }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <!-- Add actions such as approve, reject, etc. -->
                            <a href="#">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif --}}
@endsection
