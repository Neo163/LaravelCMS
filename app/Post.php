<?php

namespace App;

use App\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
