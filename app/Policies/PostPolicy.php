<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function own(User $user, Post $post)
    {
        if ($user->name == 'admin') {
            return true;
        }
        return $post->user_id == $user->id;
    }
   
}
