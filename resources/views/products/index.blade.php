@extends('layouts.base')

@section('title', 'products')

@section('content')

    <section style="margin-top: 80px">

        <<div class="container mt-5 Pt-10">
            <h1 class="mb-4">Products</h1>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 18rem;box-shadow: 1px 2px 11px 4px rgb(14 55 54 / 15%);background-color: #e3f2fd;">
                            <img src="{{isset($product->image) ? asset('storage/' . $product->image) : ''}}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                {{-- <p class="card-text">{{ $product->description }}</p> --}}
                                <p class="card-text"><strong>Address:</strong> {{ $product->address }}</p> <!-- Assuming address is a field in the product table -->
                                <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                                <p><strong>Price:</strong> {{ $product->price }} DH</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </section>



@endSection
