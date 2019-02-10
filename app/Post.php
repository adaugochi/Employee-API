<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = [
                            'id',
                            'user_id',
                            'title',
                            'body',
                            'images'
    ];
}
