@extends('posts.layout')
@section('title')Edit post: {{$post->title}} @endsection
@section('content')
<form method="POST" class="w3-panel w3-card-4" action="/posts/{{$post->id}}">
    @method('PATCH')
    @csrf
    <h2>Edit post</h2>
    <h3>Tags:</h3>
    @foreach ($post->tags as $tag)
        <a href="/tags/{{$tag->id}}" class="w3-button w3-blue">{{$tag->name}}</a>
    @endforeach
        <a href="/" class="w3-button w3-light-blue">+</a>
    <p><input class="w3-input" type="text" placeholder="Title" name="title" value="{{$post->title}}"></p>
    <p><textarea class="w3-input" placeholder="Body" name="body">{{$post->body}}</textarea></p>
    
    <p><button type="submit" class="w3-button w3-blue">Edit</button></p>
    @include('errors')
</form>  
<h5>Previous edits:</h5>
@foreach ($post->edits as $edit)
<div class="w3-panel w3-light-blue">
    <p w3-blue>Changed {{$edit->pivot->updated_at->diffForHumans()}}</p>
    <h3 w3-blue>{{$edit->pivot->old_title}}</h3>
    <p w3-blue>{{$edit->pivot->old_body}}</p>
    <p><form method="POST" class="w3-panel" action="/posts/{{$post->id}}">
            @method('PATCH')
            @csrf
            <input type="hidden" name="title" value="{{$edit->pivot->old_title}}">
            <input type="hidden" name="body" value="{{$edit->pivot->old_body}}">
            <button class="w3-button w3-blue">Roll Back</button>
    </form></p>
</div>
@endforeach

@endsection
