<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BPage extends Model
{
    use HasFactory;

    protected $table = "b_pages";

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
        'default',
        'b_user_id',
        'language_id',
        'view',
        'ranking',
        'recycle'
    ];
}
