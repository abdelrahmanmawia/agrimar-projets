@extends('layouts.base')

@section('title', 'orders')

@section('content')

    <section style="margin-top: 80px">



        <main class="mt-5">
            <div class="container mt-5 mb-5 p-5 br-1.5 bg-white shadow w-50">

                <h1>Order #{{ $order->id }}</h1>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <p>Status: {{ $order->status }}</p>
                <p>Total Price: {{ $order->total_price }} dh</p>

                <h2>Order Items</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }} dh</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
            </div>

    </section>
@endsection
