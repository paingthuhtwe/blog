@extends('layouts.app');

@section('content')
        <div class="container">
            @if (session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif
            <div class="card mb-2">
                <div class="card-body border border-primary shadow-sm rounded">
                    <h4 class="card-title">
                        {{ $article->title }}
                    </h4>
                    <div class="text-muted small">
                        <div class="badge bg-success">
                            {{ $article->user->name }}
                        </div>
                        <b>Category: </b> {{ $article->category->name }},
                        {{ $article->created_at->diffForHumans() }}
                    </div>
                    <div class="mb-2">
                        {{ $article->body }}
                    </div>

                    @auth
                        @can('article-delete', $article)
                            <a href="{{ url("/articles/edit/$article->id") }}" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-danger btn-sm">Delete</a>
                        @endcan
                    @endauth
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item active">
                    Comment
                    <div class="badge bg-danger">
                        {{ count($article->comments) }}
                    </div>
                </li>
                @foreach ($article->comments as $comment)
                    <li class="list-group-item">
                        <div class="badge bg-success">
                            {{ $comment->user->name }}
                        </div>
                        @can('comment-delete', $comment)
                            <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close btn-danger float-end"></a>
                        @endcan
                        {{ $comment->content }}
                    </li>
                @endforeach
            </ul>
            @auth
            <form action="{{ url("/comments/add") }}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="content" class="form-control mb-2"></textarea>
                <button type="submit" class="btn btn-secondary">Add Comment</button>
            </form>
            @endauth
        </div>
@endsection
