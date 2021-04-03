<?php

namespace App\Models;

use \App\Models\Model;

class BPermission extends Model
{
    /*
     * 权限属于哪些角色
     */
    public function roles()
    {
        return $this->belongsToMany(\App\Models\BRole::class, 'b_permission_role', 'permission_id', 'role_id')->withPivot(['role_id', 'permission_id']);
    }
}
