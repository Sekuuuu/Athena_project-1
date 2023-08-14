<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Blog Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}<br> {{ $post->content }} </a>

            </li>
        @endforeach
    </ul>
@endsection
