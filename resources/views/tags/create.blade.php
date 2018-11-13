@extends('posts.layout')
@section('title')Create Tag @endsection
@section('content')
<form method="POST" class="w3-panel w3-card-4" action="/tags">
    @method('POST')
    @csrf
    <h2>Create new Tag</h2>

    <p><input class="w3-input" type="text" placeholder="Name" name="name"></p>
   
    <p><button class="w3-button w3-blue">Create</button></p>
    @include('errors')
</form>  
@endsection