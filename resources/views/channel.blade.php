@extends('layouts.app')
@section('title', "| Home")

@section('content')

    @if(count($discussions) == 0)
        <h5><strong>Discussions list is empty</strong></h5>
    @else

        @foreach($discussions as $discussion)
        <div class="card mb-3">
            
            <div class="card-header user-data">
                <img src="{{ $discussion->user->avatar }}" alt="img" width="50px" height="50px">
                &nbsp;&nbsp;
                <div>
                    {{ $discussion->user->name }}, 
                    <span class="badge badge-primary">has {{ $discussion->user->points }} points</span>
                    <br><b>{{ $discussion->created_at->diffForHumans() }}</b>
                </div>

                <div class="float-right">
                    <div class="display-block">
                        <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" 
                            class="btn btn-sm btn-outline-primary">
                             View
                        </a>
                    </div>
                    <div class="display-block text-center">
                    @if($discussion->hasBestAnswer())
                        <span class="badge badge-info">Closed</span>
                    @else
                        <span class="badge badge-info">Open</span>
                    @endif
                    </div>
                </div>
                
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
        
        <div class="my-5">
            {{ $discussions->links() }}
        </div>

    @endif
  
@endsection
