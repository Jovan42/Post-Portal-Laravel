<?php

namespace App\Http\Controllers;

use App\Post;
use App\Edit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utils\PostUtils;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Post $post)
    {
        request()['user_id'] = auth()->id();
        $post = PostUtils::create(request());
        return redirect('/posts');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('own', $post);
        $tagNames = array_column($post->tags->all(), 'name');
        return view('posts.edit', compact('post', 'tagNames'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('own', $post);
        $editData = PostUtils::getEditData($post);

        DB::transaction(function () use ($editData, $post) {
            Edit::create($editData);
            $post->update(
                request()->validate([
                    'title' => ['required', 'min:3'],
                    'body' => 'required'
                ])
            );
        });
        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        $this->authorize('own', $post);
        DB::transaction(function () {
            foreach ($post->edits as $edit) {
                $edit->pivot->delete();
            }

            $post->delete();
        });
        return redirect('/posts');
    }

    public function like(Post $post)
    {
        $post->likes = $post->likes + 1;
        $post->update();
        return redirect('/posts/' . $post->id);
    }

    public function dislike(Post $post)
    {
        $post->dislikes = $post->dislikes + 1;
        $post->update();
        return redirect('/posts/' . $post->id);
    }
}
