<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use \App\Models\Model;

class BParagraph extends Model
{
    use HasFactory;

    protected $table = "b_paragraphs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'category',
        'language_id',
    ];
}
