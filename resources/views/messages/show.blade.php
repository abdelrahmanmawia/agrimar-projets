@extends('layouts.base')

@section('content')
<section style="margin-top:80px">
<div class="container">
    <h1>Message</h1>

    <div class="card">
        <div class="card-header">
            <strong>From:</strong> {{ $message->sender->name }} <strong>To:</strong> {{ $message->receiver->name }}
        </div>
        <div class="card-body">
            <p>{{ $message->message }}</p>
            <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>

    <a href="{{ route('messages.index') }}" class="btn btn-secondary mt-3">Back to Messages</a>
</div>
</section>
@endsection

