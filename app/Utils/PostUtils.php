<?php

namespace App\Utils;

use App\Post;
use App\Tag;
use App\PostTag;

class PostUtils 
{    
    public static function create($data) {
        $post = Post::create(
            $data->validate([
                'title' => ['required', 'min:3'],
                'body' => 'required',
                'user_id' => 'required'
            ])
        );

        PostDAL::addTags($post);
    }

    public static function addTags($post) {
        foreach (Tag::all() as $tag) {
            if (request()->get($tag->name)) {
                $data = [
                    'post_id' => $post->id,
                    'tag_id' => $tag->id
                ];
                PostTag::create($data, 'post_tag');
            }
        }
    }

    public static function getEditData(Post $post) {
        return [
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'old_title' => $post->title,
            'old_body' => $post->body,
        ];
    }

}