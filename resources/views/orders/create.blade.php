@extends('layouts.base')

@section('title', 'orders')

@section('content')

    <h1>orders</h1>
    <main class="mt-5">
        <div class="container mt-5 mb-5 p-5 br-1.5 bg-white shadow w-50">
            <h3>Create order</h3>
            <div>
                <div class="card-body">
                    <h5>{{$product->name}}</h5>
                    <p>{{$product->description}}</p>
                    <p>{{$product->price}} DH</p>
                    <img src="{{ isset($product->image) ? asset('storage/' . $product->image) : '' }}" alt="">

                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form action="{{ route('orders.store',$product) }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </main>
@endSection
