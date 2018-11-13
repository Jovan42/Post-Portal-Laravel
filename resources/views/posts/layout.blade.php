<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <style> a {text-decoration: none;} </style>
        <title>@yield('title')</title>
    </head>
    <div class="w3-bar w3-blue" >
        <a href="/posts" class="w3-bar-item w3-hover-grey">Posts</a>
        <a href="/tags" class="w3-bar-item w3-hover-grey">Tags</a>
        @if (auth()->id())
            <a href="/posts/create" class="w3-bar-item w3-hover-grey">New post</a>
            <a href="/tags/create" class="w3-bar-item w3-hover-grey">New tag</a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="w3-bar-item w3-hover-grey">Logout</button>
            </form>
        @else
            <a href="/login" class="w3-bar-item w3-hover-grey">Login</a>
            <a href="/register" class="w3-bar-item w3-hover-grey">Register</a>
        @endif
      
    </div>
    <body class="w3-container">
            @yield('content')   
    </body>
</html>