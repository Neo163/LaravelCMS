<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use \App\Models\Model;

class BMenuLocation extends Model
{
    use HasFactory;

    protected $table = "b_menus_locations";

    protected $fillable = [
        'title', 'b_menu_category_id', 'b_user_id'
    ];

    //和菜单分类进行关联
    public function BMenuCategory()
    {
        return $this->hasOne(\App\Models\BMenuCategory::class, 'id', 'b_menu_category_id');
    }
}
