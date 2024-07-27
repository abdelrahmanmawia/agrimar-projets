@extends('layouts.base')

@section('title', 'products')

@section('content')

    <h1>products</h1>
    <main class="mt-5 justify-content-center d-flex ">

        <div class="container mt-5 mb-5 p-5 bg-white w-50 " >
            <img
                src="{{ isset($product->image) ? asset('storage/' . $product->image) : '' }}" class="card-img-top"
                alt="{{ $product->name }}" style="border: 1px solid;border-radius:10%; " >
            </div>

        <div class="container mt-5 mb-5 p-5  bg-white w-50">
            @if ($product->quantity > 0)
            <label class="badge bg-success end-0 start-100 ">In Stock</label>
        @else
            <label class="badge bg-danger ">Out of Stock</label>

        @endif

            <div class="col-md-12 border-bottom">
                <h2 class="font-weight-bold">{{ $product->name }}</h2>
            </div>
            <div class="row mb-3 col-md-12 border-bottom pt-3">
                <span><strong>Price:</strong> {{ $product->price }} dh</span>
                <span><strong>Category:</strong> {{ $product->category->name }}</span>

            </div>


            <div class="card-text border-bottom pb-3"><strong>Description:</strong> {{ $product->description }}</div>
            <div class="row mt-2">
                {{-- <div class="col-md-3">
                    <label for="quantity">Quantity</label>
                    <div class="input-group mb-3 text-center" style="width: 130px">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" class="form-control text-center qty-input" name="quantity" placeholder="1" value="1">
                        <button class="input-group-text increment-btn">+</button>

                    </div>

                </div> --}}

                <div class="col-md-9">
                    <br>
                    <button type="button" class="btn btn-success">Add to cart <i class="bi bi-cart"></i></button>

                </div>

            </div>


        </div>





    </main>



@endsection



