@extends('posts.layout')
@section('title')All Tags @endsection
@section('content')
    <h2>All posts</h2>
    <style> a {text-decoration: none;} </style>
    @foreach ($tags as $tag)
    <a href="/tags/{{$tag->id}}">
    <div class="w3-panel w3-light-blue w3-hover-blue">
            <h4 class="w3-text-white">{{$tag->name}}</h4>
    </div>
    </a>
    @endforeach
@endsection