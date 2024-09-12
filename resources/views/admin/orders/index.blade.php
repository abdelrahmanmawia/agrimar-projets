@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="container">
    <h1>All Orders</h1>

    @if($orders->isEmpty())
        <p>No orders available.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>buyer</th>
                    <th>seller</th>
                    <th>Status</th>
                    <th>Total Price</th>
                    <th>Order Date</th>

                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->buyer->name }}</td>
                        <td>{{ $order->seller->name }}</td>
                        <td>{{ $order->status }}</td>
                        <td>${{ $order->total_price }}</td>
                        <td>{{ $order->created_at->format('Y-m-d') }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
