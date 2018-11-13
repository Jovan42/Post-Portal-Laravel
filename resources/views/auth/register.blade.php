@extends('posts.layout')
@section('title')Create Post @endsection
@section('content')
<form method="POST" class="w3-panel w3-card-4" action="/register">
    @method('POST')
    @csrf
    <h2>Register acccount</h2>
   
    <p><input class="w3-input" type="text" placeholder="Name" name="name"></p>
    <p><input class="w3-input" type="email" placeholder="eMail" name="email"></p>
    <p><input class="w3-input" type="password" placeholder="Password" name="password"></p>
    <p><input class="w3-input" type="password" placeholder="Password" name="password_confirmation"></p>
   
    <p><button class="w3-button w3-blue">Register</button></p>
    @include('errors')
</form>  
@endsection