@extends('posts.layout')
@section('title')Tag:  {{$tag->name}} @endsection
@section('content')
    <h2>Posts with {{$tag->name}} tag</h2>
    <style> a {text-decoration: none;} </style>
    @foreach ($tag->posts as $post)
    <a href="/posts/{{$post->id}}">
    <div class="w3-panel w3-light-blue w3-hover-blue">
            <h4 class="w3-text-white">{{$post->title}}</h4>
            <p class="w3-text-white">{{substr($post->body, 0, 256).'...'}}</p>
    </div>
    </a>
    @endforeach
@endsection