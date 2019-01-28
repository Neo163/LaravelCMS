<?php

namespace App;

use App\Model;

class Category extends Model
{
    public function posts()
    {
    	return $this->hasMany('App\Post')->orderBy('created_at', 'desc');
    }
}
