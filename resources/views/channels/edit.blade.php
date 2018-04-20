@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Edit channel: {{ $channel->title }}</div>

    <div class="card-body">
        <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post">
            @csrf
            @method('put')                     

            <div class="form-group">
                <input type="text" name="channel" class="form-control" value="{{ $channel->title }}">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-xs btn-success">Update channel</button>
                </div>
            </div>
        </form>
    </div>
</div>
       
@endsection
