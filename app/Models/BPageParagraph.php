<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BPageParagraph extends Model
{
    use HasFactory;

    protected $table = "b_pages_paragraphs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'category',
        'b_page_id',
        'language_id'
    ];
}
