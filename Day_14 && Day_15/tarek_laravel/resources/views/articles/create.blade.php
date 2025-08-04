@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Create Article</h2>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" name="body" id="body" rows="5">{{ old('body') }}</textarea>
            @error('body') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection