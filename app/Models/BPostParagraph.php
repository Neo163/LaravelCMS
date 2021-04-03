<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use \App\Models\Model;

class BPostParagraph extends Model
{
    use HasFactory;

    protected $table = "b_posts_paragraphs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'category',
        'b_post_id',
        'language_id'
    ];
}
