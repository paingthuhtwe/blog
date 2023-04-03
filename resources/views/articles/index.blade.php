@extends('layouts.app');

@section('content')
        <div class="container">
            {{ $articles->links() }}

            @if (session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif

            @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $article->title }}
                    </h4>
                    <div class="text-muted small">
                        <b>Category:
                            {{ $article->category->name }}</b>
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                    <div>
                        {{ $article->body }}
                    </div>
                    <a href="{{ url("/articles/detail/$article->id") }}" class="card-link">Detail</a>
                </div>
            </div>
            @endforeach
        </div>
@endsection
