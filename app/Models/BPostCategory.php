<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;
use \App\Models\BPostType;

class BPostCategory extends Model
{
    use HasFactory;

    protected $table = "b_posts_categories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'sort',
        'parent',
        'b_user_id',
        'b_posts_type_id'
    ];

    /*
     * 分类属于哪些文章
     */
    public function posts()
    {
        return $this->belongsToMany(\App\Models\BPost::class, 'b_post_category_relationships', 'b_category_id', 'b_post_id');

        // return $this->belongsToMany(\App\Models\BPost::class, 'b_post_category_relationships', 'b_category_id', 'b_post_id')->withPivot(['b_post_id', 'b_category_id']);
    }
}
