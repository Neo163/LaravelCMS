<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $table = "b_posts_comments";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'content', 
        'parent',
        'good',
        'user_id',
        'check',
        'report',
        'ranking',
        'language_id',
    ];
}
