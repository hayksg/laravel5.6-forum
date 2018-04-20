@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header text-center">Create a new discussion</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        
        <form action="{{ route('discussions.store') }}" method="post">
            
            @csrf
            
            <div class="form-group">
                <label for="channel_id">Pick a channel</label>
                <select name="channel_id" id="channel_id" class="form-control">
                    @foreach($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="content">Ask a question</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Create discussion</button>
            </div>
            
        </form>
    </div>
</div>
 
@endsection
