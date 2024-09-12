@extends('layouts.base')

@section('title', 'messages')

@section('content')
<section style="margin-top:80px">
<div class="container">
    <h1>chats</h1>

    <div class="list-group">
        @foreach($latestMessages as $message)
            @php
                $otherUser = $message->sender_id == Auth::id() ? $message->receiver : $message->sender;
            @endphp
            <a href="{{ route('messages.chat', $otherUser->id) }}" class="list-group-item list-group-item-action">
                <div>
                    <strong>{{ $otherUser->name }}</strong>
                </div>
                @if ($message->sender_id == Auth::id())
                <div><span><b>you:</b></span> {{ Str::limit($message->message, 50) }}</div>
                @else
                <div>{{ Str::limit($message->message, 50) }}</div>

                @endif

                <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
            </a>
        @endforeach
    </div>
</div>
</section>
@endsection

