<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Model;

class BMenu extends Model
{
    use HasFactory;

    protected $rememberTokenName = '';

    protected $table = "b_menus";

    protected $fillable = [
        'title', 'link', 'icon', 'sort', 'parent', 'b_menus_category_id', 'b_user_id', 'language_id'
    ];
}
