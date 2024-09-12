@extends('layouts.base')

@section('title', 'profile')

@section('content')

<section style="margin-top: 80px">

    <h1>Profile</h1>

    <div class="container mt-5 mb-5 p-5 bg-white w-50" style="align-content: center; text-align: center ">
        <img src="{{ asset('images/grass.jpg') }}" alt="" style="border-radius: 50%; border: 1px solid;
        width: 200px; height: 200px">

        <h3 style="margin-top: 20px;"> <i class="fas fa-user"></i> {{ $user->name }}</h3>
        <h3> <i class="bi bi-envelope"></i> {{ $user->email }}</h3>
         <h3> <i class="bi bi-whatsapp"></i><i class="fas fa-phone"></i> +212 {{ $user->phone_number }}</h3>

    </div>


</section>

@endsection
