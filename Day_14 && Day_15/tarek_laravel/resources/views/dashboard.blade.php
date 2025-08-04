@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Dashboard</h4>
                </div>

                <div class="card-body">
                    <p class="fs-5">You're logged in, {{ Auth::user()->name }}!</p>

                    <hr>

                    <a href="{{ route('articles.index') }}" class="btn btn-outline-primary">
                        Go to Articles
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
