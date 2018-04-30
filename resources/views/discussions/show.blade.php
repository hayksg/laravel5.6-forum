@extends('layouts.app')
@section('title', "| Home")

@section('content')

<div class="card mb-3">
    <div class="card-header">
        <img src="{{ $discussion->user->avatar }}" alt="img" width="50px" height="50px">
        &nbsp;&nbsp;
        <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
       
        @if($discussion->is_being_watched_by_auth_user())
            <a href="{{ route('discussion.unwatch', ['discussion' => $discussion]) }}" class="btn btn-outline-primary float-right">Unwatch</a>
        @else
            <a href="{{ route('discussion.watch', ['discussion' => $discussion]) }}" class="btn btn-outline-primary float-right">Watch</a>
        @endif 
        
    </div>
    <div class="card-body">
        <h5><strong>{{ $discussion->title }}</strong></h5>
        <p>{{ $discussion->content }}</p>
    </div>
</div>

<hr>

<div class="mt-5 mb-4">
    <p class="replies-count">
        <span class="badge badge-pill badge-primary">{{ $dc = $discussion->replies->count() }}</span> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              
        {{ $dc > 1 ? 'Replies' : 'Reply' }}
    </p>
</div>

@foreach($discussion->replies as $reply)
<div class="card mb-3">
    <div class="card-header">
        <img src="{{ $reply->user->avatar }}" alt="img" width="50px" height="50px">
        &nbsp;&nbsp;
        <span>{{ $reply->user->name }}, <b>{{ $reply->created_at->diffForHumans() }}</b></span>
    </div>
    <div class="card-body">
        <p>{{ $reply->content }}</p>
    </div>
    <div class="card-footer">
        @if ($reply->is_liked_by_auth_user())
            <a href="{{ route('reply.unlike', ['reply' => $reply]) }}" class="btn btn-outline-danger btn-sm">
                <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> &nbsp;
                <strong>Unlike &nbsp;<span class="badge badge-pill badge-danger">{{ $reply->likes->count() }}</span></strong>
            </a>
        @else
            <a href="{{ route('reply.like', ['reply' => $reply]) }}" class="btn btn-outline-success btn-sm">
                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> &nbsp;
                <strong>Like &nbsp;<span class="badge badge-pill badge-success">{{ $reply->likes->count() }}</span></strong>
            </a>
        @endif
    </div>
</div>
@endforeach

@if(auth()->check())

    <div class="card">
        <div class="card-body">
            <form action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="reply">Leave a reply</label>
                    <textarea name="reply" id="reply" class="form-control{{ $errors->has('reply') ? ' is-invalid' : '' }}" cols="30" rows="10"></textarea>
                    @if ($errors->has('reply'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('reply') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-xs btn-success float-right">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@else
    <p class="mt-4"><strong>Sign in to leave a reply</strong></p>
@endif
    
@endsection
