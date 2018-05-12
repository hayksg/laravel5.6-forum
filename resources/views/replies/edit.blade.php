@extends('layouts.app')
@section('title', "| Discussion")

@section('content')

<div class="card">
    <div class="card-header text-center">Update a reply</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('reply.update', ['reply' => $reply]) }}" method="post">
            
            @csrf

            <div class="form-group">
                <label for="content">Answer a question</label>
                <textarea name="content" 
                          id="content" 
                          cols="30" 
                          rows="10" 
                          class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" 
                          required>{{ $reply->content }}</textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Save reply changes</button>
            </div>
            
        </form>
    </div>
</div>
 
@endsection
