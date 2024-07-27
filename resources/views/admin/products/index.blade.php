@extends('layouts.admin')

@section('title', 'products')

@section('content')

    <div class="container-fluid px-4">

        <h1>products</h1>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div>
            <table class="table" border="1">
                <tr>

                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>image</th>
                    <th>description</th>
                    <th>action</th>

                    @foreach ($products as $product)
                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->region->name }}</td>
                    <td>{{ $product->price }} dh</td>
                    <td>{{ $product->quantity }}</td>
                    <td> <img src="{{ isset($product->image) ? asset('storage/' . $product->image) : '' }}"
                            class="img-thumbnail" alt="{{ $product->name }}" width="100" height="100"></td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.destroy', $product->id) }}"
                            onclick="return confirm('Are you sure you want to delete this product?')"><button
                                class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
                </tr>
            </table>
            <a href="{{ route('products.create') }}"><button class="btn btn-primary">Add product</button></a>

        </div>

    </div>

@endsection
