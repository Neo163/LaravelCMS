<?php

namespace App\Models;

use \App\Models\Model;

class BPermissionRole extends Model
{
    protected $table = "b_permission_role";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'permission_id'
    ];
    
}
