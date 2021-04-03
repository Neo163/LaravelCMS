<?php

namespace App\Models;

use \App\Models\Model;

class BRole extends Model
{
    protected $table = "b_roles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];

    /*
     * 当前角色的所有权限
     */
    public function permissions()
    {
        return $this->belongsToMany(\App\Models\BPermission::class, 'b_permission_role', 'role_id', 'permission_id')->withPivot(['role_id', 'permission_id']);
    }

    /*
     * 给角色授权
     */
    public function grantPermission($permission)
    {
        return $this->permissions()->save($permission);
    }

    /*
     * 删除role和permission的关联
     */
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    /*
     * 角色是否有权限
     */
    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission);
    }
}
