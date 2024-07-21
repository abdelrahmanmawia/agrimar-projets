@extends('layouts.base')

@section('title', 'products')

@section('content')

    <h1>products</h1>
    <main class="mt-5">
        <div class="container mt-5 mb-5 p-5 br-1.5 bg-white shadow w-50">
            <h3>Edit product</h3>
            <form action="{{ route('products.update', $product) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control"
                        value="{{ $product->description }}">
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        value="{{ $product->quantity }}">
                </div>
                <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="" selected disabled> choose one categorey</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </main>
@endSection
