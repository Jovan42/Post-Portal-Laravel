<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function addComment($data)
    {
        $this->comments()->create($data);
    }

    public function edits()
    {
        return $this->belongsToMany(User::class, 'edits')->withTimestamps()
        ->withPivot(['old_title', 'old_body'])->latest('pivot_updated_at');
    }
}
