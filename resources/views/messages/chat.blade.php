@extends('layouts.base')

@section('content')
<section style="margin-top:80px">
<div class="container">
    <h1>Chat</h1>
    <h3>To: <a href="{{ route('profile.show', ['id' => $receiver_id]) }}"> {{ $receiver->name }} </a> </h3>


    <div class="card">
        <div class="card-body">
            <div class="chat-box" style="height: 400px; overflow-y: scroll;">
                @foreach($messages as $message)
                    <div class="message {{ $message->sender_id == Auth::id() ? 'text-right' : '' }}">
                        <strong>{{ $message->sender->name }}</strong>
                        <p>{{ $message->message }}</p>
                        <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>

            <form action="{{ route('messages.store') }}" method="POST" class="mt-3">
                @csrf

                    <input type="hidden" name="receiver_id" value="{{ $receiver_id }}">


                <div class="form-group">
                    <textarea name="message" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
</section>
@endsection

<style>
    .message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
    }
    .text-right {
        text-align: right;
    }
</style>
