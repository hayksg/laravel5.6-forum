@extends('layouts.app')
@section('title', "| Discussion")

@section('content')

<div class="card">
    <div class="card-header text-center">Create a new discussion</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
<!--        @include('layouts.errors')-->

        <form action="{{ route('discussions.store') }}" method="post">
            
            @csrf
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required>

                @if ($errors->has('title'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="channel_id">Pick a channel</label>
                <select name="channel_id" id="channel_id" class="form-control{{ $errors->has('channel_id') ? ' is-invalid' : '' }}" required>
                    @foreach($channels as $channel)
                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                    @endforeach
                </select>
                @if ($errors->has('channel_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('channel_id') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="content">Ask a question</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" required></textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Create discussion</button>
            </div>
            
        </form>
    </div>
</div>
 
@endsection
