@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div>
        @endif
        <form method="post" style="width: 400px">
            @csrf
            <label>Title</label>
            <input type="text" class="form-control mb-2" name="title" value="{{ $article->title }}">
            <label>Body</label>
            <textarea name="body" rows="5" class="form-control mb-2">{{ $article->body }}</textarea>
            <label>Category</label>
            <select name="category_id" class="form-select mb-2">
                $@foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $article->category_id)
                        selected
                    @endif> {{ $category->name }} </option>
                @endforeach
            </select>
            <button class="btn btn-primary">Update Article</button>
        </form>
    </div>
@endsection
