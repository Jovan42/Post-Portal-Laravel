@extends('posts.layout')
@section('title')Create Post @endsection
@section('content')
<form method="POST" class="w3-panel w3-card-4" action="/posts">
    @method('POST')
    @csrf
    <h2>Create new Post</h2>

    <p><input class="w3-input" type="text" placeholder="Title" name="title"></p>
    <p><textarea class="w3-input" placeholder="Body" name="body"></textarea></p>
   
    @foreach (\App\Tag::all() as $tag)
    <p><input class="w3-check" type="checkbox" name="{{$tag->name}}" value="{{$tag->name}}"> {{$tag->name}}</p>
    @endforeach
    <p><button class="w3-button w3-blue">Create</button></p>
    @include('errors')

   
</form>  
@endsection