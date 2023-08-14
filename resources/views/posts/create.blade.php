<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create New Post</h1>
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <div>
            <button type="submit">Create Post</button>
        </div>
    </form>
@endsection
