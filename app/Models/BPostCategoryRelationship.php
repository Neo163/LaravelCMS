<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BPostCategoryRelationship extends Model
{
    use HasFactory;

    protected $table = "b_post_category_relationships";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'b_post_id',
        'b_category_id',
    ];
}
