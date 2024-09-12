@extends('layouts.base')

@section('title', 'profile')

@section('content')

<section style="margin-top: 80px">

    <div style="align-items: center ; text-align: center">
    <h1>Profile</h1>
    </div>

    <div class="container mt-5 mb-5 p-5 bg-white w-50" style="align-content: center; text-align: center ">
        <img src="{{ isset($user->profile_image) && !empty($user->profile_image) ? asset('profile_images/' . $user->profile_image) : asset('images/hajar.jpg') }}" alt="" style="border-radius: 50%; border: 1px solid;
        width: 200px; height: 200px">

        <h3 style="margin-top: 20px;"> <i class="fas fa-user"></i> {{ $user->name }}</h3>
        <h3> <i class="bi bi-envelope"></i> {{ $user->email }}</h3>
         <h3> <i class="bi bi-whatsapp"></i><i class="fas fa-phone"></i> +212 {{ $user->phone_number }}</h3>

         <div class="position-absolute bottom-0 start-50 translate-middle-x">
            <a href="{{ route('messages.chat', ['receiver_id' =>  $user->id]) }}" class="btn btn-primary">send a Message</a>
         </div>

    </div>


</section>

@endsection
