<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BMedia extends Model
{
    use HasFactory;

    protected $table = "b_media";

    protected $fillable = [
        'title',
        'fix_link',
        'month',
        'size',
        'size_count',
        'b_media_category_id',
        'b_user_id'
    ];

    // 媒体对应的分类
    public function bMediaCategory()
    {	
    	return $this->belongsTo('App\Models\BMediaCategory', 'b_media_category_id', 'id');
    }
}
