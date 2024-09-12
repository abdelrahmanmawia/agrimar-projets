@extends('layouts.base')

@section('content')

<section style="margin-top: 80px">
    <h1>Search Results</h1>

    <form action="{{ route('products.search') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="query" class="form-control" placeholder="Search products" value="{{ request('query') }}">
            </div>
            <div class="col-md-2">
                <select name="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
                    <!-- Add other categories as needed -->
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ request('min_price') }}">
            </div>
            <div class="col-md-2">
                <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}">
            </div>
            <div class="col-md-2">
               <select name="region" class="form-control">
                   <option value="">Select Region</option>
                   @foreach ($regions as $region)
                       <option value="{{ $region->id }}" {{ request('region') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                   @endforeach
               </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    @if($products->isEmpty())
        <p>No products found.</p>
    @else
    <div class="products-conatiner d-grid gap-3" style="grid-template-columns: repeat(auto-fit,minmax(260px,auto));">
        <!-- box1 -->
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card"
                    style="width: 18rem;box-shadow: 1px 2px 11px 4px rgb(14 55 54 / 15%);background-color: #e3f2fd;">
                    <img src="{{ isset($product->image) ? asset('storage/' . $product->image) : '' }}"
                        class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        {{-- <p class="card-text">{{ $product->description }}</p> --}}
                        <p class="card-text"><strong>Address:</strong> {{ $product->address }}</p>
                        <!-- Assuming address is a field in the product table -->
                        <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                        <p><strong>Price:</strong> {{ $product->price }} DH</p>
                    </div>


                    <a href="{{ route('products.show', $product) }}" class="btn btn-success"> <i class="bi bi-cart" ></i>order</a>



                </div>
            </div>
        @endforeach

    </div>
    @endif
</div>
</section>
@endsection
