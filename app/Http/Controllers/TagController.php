<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        Tag::create(
            request()->validate([
                'name' => ['required', 'min:3'],
            ])
        );

        return redirect('/tags');
    }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
        
    }

    public function edit(Tag $tag)
    {
        //
    }

    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        //
    }
}
