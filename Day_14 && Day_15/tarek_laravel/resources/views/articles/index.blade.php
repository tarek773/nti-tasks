@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Articles</h2>
        <a href="{{ route('articles.create') }}" class="btn btn-success">Create New Article</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="list-group">
        @forelse ($articles as $article)
            <div class="list-group-item">
                <h5>{{ $article->title }}</h5>
                <p>{{ Str::limit($article->body, 100) }}</p>
                <small class="text-muted">Written by {{ $article->user->name }} | {{ $article->created_at->diffForHumans() }}</small>
                <div class="mt-2">
                    @can('update', $article)
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                    @endcan
                    
                    @can('delete', $article)        
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    @endcan
                </div>
            </div>
        @empty
            <p>No articles found.</p>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $articles->links() }}
    </div>
</div>
@endsection
