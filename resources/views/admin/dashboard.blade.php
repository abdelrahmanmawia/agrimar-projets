@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')



<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h2 class="fs-2">Total Products</h2>
                    <h3 class="fs-1">{{ $products->count() }}</h3>
                </div>
                <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h2 class="fs-2">Total Categories</h2>
                    <h3 class="fs-1">{{ $categories->count() }}</h3>
                </div>
                <i class="fas fa-list fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h2 class="fs-2">Total Users</h2>
                    <h3 class="fs-1">{{ $users->count() }}</h3>
                </div>
                <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

    </div>


</div>















@endSection
