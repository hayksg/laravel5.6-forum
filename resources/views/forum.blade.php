@extends('layouts.app')
@section('title', "| Home")

@section('content')

    @foreach($discussions as $discussion)
    <div class="card mb-3">
        
        <div class="card-header">
            <img src="{{ $discussion->user->avatar }}" alt="img" width="50px" height="50px">
            &nbsp;&nbsp;
            <span>{{ $discussion->user->name }}</span>
        </div>
        <div class="card-body">
            {{ $discussion->content }}
        </div>
        
    </div>
    @endforeach
    
    <div class="text-center my-5 justify-content-center text-center">
        {{ $discussions->links() }}
    </div>
  
@endsection
