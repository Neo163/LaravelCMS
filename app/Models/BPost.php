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
        'id',
        'title', 
        'url',
        'abstract',
        'content', 
        'content_show', 
        'banner',
        'image',
        'structure',
        'template',
        'public',
        'b_posts_type_id',
        'b_posts_category_id',
        'b_posts_tag_id',
        'b_user_id',
        'language_id',
        'view',
        'ranking',
        'recycle',
        'remark',
    ];

    /*
     * 当前文章的所有分类
     */
    public function categories()
    {
        return $this->belongsToMany(\App\Models\BPostCategory::class, 'b_post_category_relationships', 'b_post_id', 'b_category_id');

        // return $this->belongsToMany(\App\Models\BPostCategory::class, 'b_post_category_relationships', 'b_post_id', 'b_category_id')->withPivot(['b_post_id', 'b_category_id']);
    }

    /*
     * 给文章分配分类
     */
    // public function grantcategory($category)
    // {
    //     return $this->categories()->save($category);
    // }

    /*
     * 删除post和category的关联
     */
    public function deletecategory($category)
    {
        return $this->categories()->detach($category);
    }

    /*
     * 文章是否有分类
     */
    public function hascategory($category)
    {
        return $this->categories->contains($category);
    }

    /*
     * 当前文章的所有标签
     */
    public function tags()
    {
        return $this->belongsToMany(\App\Models\BPostTag::class, 'b_post_tag_relationships', 'b_post_id', 'b_tag_id');

        // return $this->belongsToMany(\App\Models\BPostTag::class, 'b_post_tag_relationships', 'b_post_id', 'b_tag_id')->withPivot(['b_post_id', 'b_tag_id']);
    }
}
