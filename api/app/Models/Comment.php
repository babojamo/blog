<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ 
        'body', 
        'commentable_type', 
        'creator_id', 
        'commentable_id',
        'parent_id',
    ];
}
