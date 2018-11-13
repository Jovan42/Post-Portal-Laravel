@extends('posts.layout')
@section('title')Create Post @endsection
@section('content')
<form method="POST" class="w3-panel w3-card-4" action="/login">
    @method('POST')
    @csrf
    <h2>Login</h2>

    <p><input class="w3-input" type="text" placeholder="eMail" name="email"></p>
    <p><input class="w3-input" type="password" placeholder="Password" name="password"></p>
   
    <p><button class="w3-button w3-blue">Create</button></p>
    @include('errors')
</form>  
@endsection