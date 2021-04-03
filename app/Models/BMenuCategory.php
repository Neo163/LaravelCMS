<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BMenuCategory extends Model
{
    use HasFactory;

    protected $table = "b_menus_categories";

    // 菜单分类从属于菜单位置
    public function BMenuLocation()
    {	
    	return $this->belongsTo('App\Models\BMenuLocation', 'b_menus_location_id', 'id');
    }
}
