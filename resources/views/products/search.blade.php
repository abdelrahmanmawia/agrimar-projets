@extends('layouts.base')

@section('title', 'products')

@section('content')

    <h1>products</h1>
    <main class="mt-5">
        <div class="container mt-5 mb-5 p-5 br-1.5 bg-white shadow w-50">
            <h3>Search products</h3>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $product->description }}</p>
                </div>
            </div>
        </div>
    </main>
    @endsection
