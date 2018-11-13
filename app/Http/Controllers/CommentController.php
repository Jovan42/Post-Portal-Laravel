<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['store']);
    }

    public function store(Post $post)
    {
        request()['user_id'] = auth()->id();
        $post->addComment(request()->validate([
            'title' => ['required', 'min:3'],
            'body' =>'required',
            'user_id' =>'required'
        ]));        
        return redirect('/posts/'. $post->id);
    }

    public function destroy(Comment $comment)
    {
        if($comment->user_id == auth()->id())
            $comment->delete();
        return redirect('/posts/'. $comment->post_id);
    }
}
