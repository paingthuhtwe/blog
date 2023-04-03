@extends('layouts.app');

@section('content')
        <div class="container">
            <div class="card mb-2">
                <div class="card-body border border-primary shadow-sm rounded">
                    <h4 class="card-title">
                        {{ $article->title }}
                    </h4>
                    <div class="text-muted small">
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                    <div class="mb-2">
                        {{ $article->body }}
                    </div>

                    <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
@endsection
