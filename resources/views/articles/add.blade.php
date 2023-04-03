@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" style="width: 400px">
            @csrf
            <label>Title</label>
            <input type="text" class="form-control mb-2" name="title" placeholder="Title">
            <label>Body</label>
            <textarea name="body"class="form-control mb-2" placeholder="Body"></textarea>
            <label>Category</label>
            <select name="category_id" class="form-control mb-2">
                <option value="1">News</option>
                <option value="2">Tech</option>
            </select>
            <button class="btn btn-primary">Add Article</button>
        </form>
    </div>
@endsection
