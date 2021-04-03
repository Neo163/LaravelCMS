<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BTemplate extends Model
{
    use HasFactory;

    protected $table = "b_templates";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'template',
        'structure',
        'b_templates_category',
    ];

    // 模板所属的分类
    public function BTemplateCategory()
    {	
    	return $this->belongsTo('App\Models\BTemplateCategory', 'b_templates_category', 'id');
    }
}
