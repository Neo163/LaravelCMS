<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BComment extends Model
{
    use HasFactory;

    protected $table = "b_comments";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'category',
        'username',
        'user_id',
        'b_post_id',
        'status',
        'report',
        'ip',
        'parent',
        'parent_reply',
        'ranking',
        'language_id',
        'remark',
    ];
}
