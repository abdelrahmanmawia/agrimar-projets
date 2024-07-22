@extends('layouts.base')

@section('title', 'products')

@section('content')

    <section style="margin-top: 80px">


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
                    <td><a href="{{ route('products.edit', $product->id) }}"><button class="btn btn-primary">Edit</button></a>
                        <a href="{{ route('products.destroy', $product->id) }}" onclick="return confirm('Are you sure you want to delete this product?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
                </tr>
            </table>
            <a href="{{ route('products.create') }}"><button class="btn btn-primary">Add product</button></a>

        </div>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </section>



@endSection
