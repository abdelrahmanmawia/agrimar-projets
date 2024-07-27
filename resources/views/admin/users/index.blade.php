@extends('layouts.admin')

@section('title', 'users')

@section('content')

    <div class="container-fluid px-4">

        <h1>users</h1>
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
                    <th>Email</th>
                    <th>phone</th>
                    <th>Role</th>
                    <th>action</th>
                    @foreach ($users as $user)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('users.destroy', $user->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this user?')"><button
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach

            </table>


        </div>

    </div>

@endSection
