<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function own(User $user, Comment $comment)
    {
        if ($user->name == 'admin') {
            return true;
        }
        return $comment->user->id == $user->id;
    }
}
