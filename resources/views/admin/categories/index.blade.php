@extends('layouts.admin')

@section('title', 'categories')

@section('content')

    <div class="container-fluid px-4">

        <h1>categories</h1>
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
                    <th>action</th>
                    @foreach ($categories as $category)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}"> <button class="btn btn-success">Edit</button> </a>
                                <a href="{{ route('categories.destroy', $category->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this category?')"><button
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach

            </table>
            <a href="{{ route('categories.create') }}"><button class="btn btn-primary">Add Category</button></a>
        </div>
    </div>



    @endsection
