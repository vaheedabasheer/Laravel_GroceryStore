@extends('layouts.user_head')
    @section('content')
    <div class="container mt-4">
    <h3 class="text-center">Your Notifications</h3>

    @forelse ($notifications as $note)
        <div class="alert alert-info">
            {{ $note->message }}<br>
            <small>{{ $note->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p class="text-center alert alert-danger">No notifications.</p>
    @endforelse
</div>
    @stop