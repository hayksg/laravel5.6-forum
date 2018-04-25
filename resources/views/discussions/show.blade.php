@extends('layouts.app')
@section('title', "| Home")

@section('content')

<div class="card mb-3">
        
    <div class="card-header">
        <img src="{{ $discussion->user->avatar }}" alt="img" width="50px" height="50px">
        &nbsp;&nbsp;
        <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
    </div>
    <div class="card-body">
        <h5><strong>{{ $discussion->title }}</strong></h5>
        <p>{{ $discussion->content }}</p>
    </div>
    

</div>

<hr>

<div>
    <p class="replies-count">
        <span class="badge badge-pill badge-primary">{{ $dc = $discussion->replies->count() }}</span> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              
        {{ $dc > 1 ? 'Replies' : 'Reply' }}
    </p>
</div>

@foreach($discussion->replies as $reply)
    <div class="card-header">
        <img src="{{ $reply->user->avatar }}" alt="img" width="50px" height="50px">
        &nbsp;&nbsp;
        <span>{{ $reply->user->name }}, <b>{{ $reply->created_at->diffForHumans() }}</b></span>
    </div>
    <div class="card-body">
        <p>{{ $reply->content }}</p>
    </div>
    <div class="card-footer">
        <p class="replies-count">
            LIKE
        </p>
    </div>
@endforeach
      
@endsection
