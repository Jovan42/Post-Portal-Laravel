<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edit extends Model
{
    protected $fillable = [
        'old_title',
        'old_body',
        'user_id',
        'post_id'
    ];
}
