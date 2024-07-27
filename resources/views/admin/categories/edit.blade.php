@extends('layouts.admin')

@section('title', 'categories')

@section('content')

    <div class="container-fluid px-4">

        <h1>categories</h1>
        <main class="mt-5">
            <div class="container mt-5 mb-5 p-5 br-1.5 bg-white shadow w-50">
                <h3>Edit category</h3>
                <div>
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
                <form action="{{ route('categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $category->name }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </main>

    </div>
    @endsection
