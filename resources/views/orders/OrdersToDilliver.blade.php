@extends('layouts.base')

@section('title', 'orders')

@section('content')
    <section style="margin-top: 80px">


        <div class="container">
            <h1>Orders To Deliver</h1>

            @if ($orders->isEmpty())
                <p>You have no orders.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>buyer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->status }}</td>
                                <td>${{ $order->total_price }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>{{ $order->buyer->name }}</td>
                                <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('messages.chat', ['receiver_id' => $order->buyer_id]) }}" class="btn btn-primary">Message Buyer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
