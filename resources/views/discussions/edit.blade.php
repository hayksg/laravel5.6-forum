@extends('layouts.app')
@section('title', "| Discussion")

@section('content')

<div class="card">
    <div class="card-header text-center">Update a discussion</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('discussion.update', ['discussion' => $discussion]) }}" method="post">
            
            @csrf

            <div class="form-group">
                <label for="content">Ask a question</label>
                <textarea name="content" 
                          id="content" 
                          cols="30" 
                          rows="10" 
                          class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" 
                          required>{{ $discussion->content }}</textarea>
                @if ($errors->has('content'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Save discussion changes</button>
            </div>
            
        </form>
    </div>
</div>
 
@endsection
