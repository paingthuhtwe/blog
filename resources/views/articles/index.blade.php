@extends('layouts.app')

@section('content')
        <div class="container">
            {{ $articles->links() }}

            @if (session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif

            <div class="row p-2">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card-body alert alert-success w-100 h-100 p-3 rounded shadow-sm">
                            <h3 class="card-title">
                                {{ $article->title }}
                            </h3>
                            <div class="text-muted small">
                                <div class="badge bg-danger">
                                    <b>Category: </b>
                                    {{ $article->category->name }}
                                </div>
                                <div class="badge bg-danger">
                                    <b>Comment: {{ count($article->comments) }}</b>
                                </div>
                                <div class="badge bg-danger">
                                    {{ $article->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <div>
                                {{ $article->body }}
                            </div>
                            <a href="{{ url("/articles/detail/$article->id") }}" class="card-link">Detail</a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection
