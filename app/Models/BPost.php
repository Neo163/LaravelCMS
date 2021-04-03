<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use \App\Models\Model;

class BPost extends Model
{
    use HasFactory;

    protected $table = "b_posts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'content', 
        'content_show', 
        'image',
        'structure',
        'template',
        'b_posts_type_id',
        'b_posts_category_id',
        'b_posts_tag_id',
        'b_user_id',
        'language_id',
        'view',
        'ranking',
        'recycle'
    ];
}
