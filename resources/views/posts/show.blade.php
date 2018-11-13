@extends('posts.layout')
@section('title'){{$post->title}} @endsection
@section('content')
    <h1 class="w3-panel w3-light-blue w3-center w3-text-dark-grey w3-hover-text-white w3-round-xxlarge">
    {{$post->title}}</h2>
    <p class="w3-panel"> Tags:
        @foreach ($post->tags as $tag)
            <a href="/tags/{{$tag->id}}" class="w3-button w3-blue">{{$tag->name}}</a>
        @endforeach
    </p>
    <div class="w3-panel">
       <form method="POST" action="/posts/{{$post->id}}/like">
            @csrf
            @method('PATCH')
            <button type="submit" class="w3-button w3-panel">Like: </button>{{$post->likes}}
       </form>
       <form method="POST" action="/posts/{{$post->id}}/dislike">
            @csrf
            @method('PATCH')
            <button type="submit" class="w3-button w3-panel">Dislike: </button>{{$post->dislikes}}
        </form>
    </div>
    <p class="w3-panel w3-light-grey w3-large">{{$post->body}}</p>
    @can('own', $post)
    <form class="w3-panel" action="/posts/{{$post->id}}/edit">
        <button type="submit" class="w3-button w3-blue">Edit</button>
    </form>
    <form method="POST" class="w3-panel" action="/posts/{{$post->id}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="w3-button w3-black">Delete</button>
    </form>
    @endcan
    <div>
        @if (auth()->id())
        <form method="POST" class="w3-panel w3-light-blue w3-card-4" action="/posts/{{$post->id}}/comments">
            <h5>Comment on post</h5>
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <p><input class="w3-input" type="text" placeholder="Title" name="title"></p>
            <p><textarea class="w3-input" placeholder="Body" name="body"></textarea></p>
            <p><button type="submit" class="w3-button w3-blue">Comment</button></p>
            @include('errors')
        </form>
        @endif
        
        <h4>Comments:</h4>
        @if ($post->comments->count())
          
            @foreach ($post->comments as $comment)
            <div class="w3-panel w3-blue">
                <h4 class="w3-text-white">{{$comment->title}}</h4>
                <p class="w3-text-white">{{$comment->body}}</p>
                <form method="POST"  action="/comments/{{$comment->id}}">
                    @can('own', $comment)
                        @csrf
                        @method('DELETE')
                        <p><button type="submit" class="w3-button w3-white">Delete comment</button></p>
                    @endcan
                </form>
            </div>            
            @endforeach               
        @else
            <div class="w3-panel w3-blue"> 
                <p>No comments right now</p>
            </div>
        @endif
    </div>
    
@endsection