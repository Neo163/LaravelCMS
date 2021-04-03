<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BMediaCategory extends Model
{
    use HasFactory;

    protected $table = "b_media_categories";

    protected $fillable = [
        'title',
        'sort',
        'parent',
        'b_user_id'
    ];
}
