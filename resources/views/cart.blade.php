@extends('layouts.base')

@section('content')

    <section style="margin-top: 80px">


        <div class="container">
            <h1>Shopping Cart</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($cart->items->count())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->product->price }}</td>
                                <td>
                                    <a href="{{ route('cart.delete', $item->id) }}" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ route('order.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Place Order</button>
                </form>
            @else
                <p>Your cart is empty</p>
            @endif
        </div>

    </section>
@endsection
