<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BPostType extends Model
{
    use HasFactory;

    protected $table = "b_posts_types";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'sort',
        'parent',
        'b_user_id'
    ];
}
