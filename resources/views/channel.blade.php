@extends('layouts.app')
@section('title', "| Home")

@section('content')

    @foreach($discussions as $discussion)
    <div class="card mb-3">
        
        <div class="card-header">
            <img src="{{ $discussion->user->avatar }}" alt="img" width="50px" height="50px">
            &nbsp;&nbsp;
            <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
            <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" class="btn btn-outline-primary float-right">View</a>
        </div>
        <div class="card-body">
            <h5><strong>{{ $discussion->title }}</strong></h5>
            <p>{{ str_limit($discussion->content, 250) }}</p>
        </div>
        <div class="card-footer">
            <p class="replies-count">
                <span class="badge badge-pill badge-primary">{{ $dc = $discussion->replies->count() }}</span> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              
                {{ $dc > 1 ? 'Replies' : 'Reply' }}
            </p>
        </div>
        
    </div>
    @endforeach
    
    <div class="text-center my-5 justify-content-center text-center">
        {{ $discussions->links() }}
    </div>
  
@endsection
