@extends('posts.layout')
@section('title')All Posts @endsection
@section('content')
    <h2>All posts</h2>
    <style> a {text-decoration: none;} </style>
    @foreach ($posts as $post)
    <a href="/posts/{{$post->id}}">
    <div class="w3-panel w3-light-blue w3-hover-blue">
            <h4 class="w3-text-white">{{$post->title}}</h4>
            <p class="w3-text-white">{{substr($post->body, 0, 256).'...'}}</p>
    </div>
    </a>
    @endforeach
@endsection