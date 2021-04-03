<?php

namespace App\Admin\Controllers;

use \App\Models\BUser;
use \App\Models\BRole;
use \App\Models\BPermission;
use \App\Models\BPermissionRole;

class RoleController extends Controller
{
	public function index()
	{
		$roles = BRole::paginate(20);
		return view("admin.role.index", compact('roles'));
	}

	public function create()
	{
		$this->validate(request(), [
			'title' => 'required|min:3',
		]);

		// BRole::create(request(['title', 'description']));
		BRole::create([
            'title' => request('title'),
            'description' => request('description'),
        ]);

		return back();
	}

	public function update()
	{
		$this->validate(request(), [
            'title' => 'required',
        ]);

		// $this->authorize('update_note', $note);

        $updateKey = 'updatebAEzBQMAadasmaYgds11raFjsaasjHI0qGcdf33S3UpdasteMenu';
        $updateKey1 = 'upAdateAEzdBSQaMsmaYScDgrjbdjHaSI0gaq33F3UpdSaatefMenu';

        if ( request('updateKey') == $updateKey && request('updateKey1') == $updateKey1 )
        {
            BRole::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
                'description' => request('description'),
            ]);
        }

		$data = array();
		$data['id']    = request('id');
		$data['title'] = request('title');
		$data['description'] = request('description');

		return $data;
	}

    public function delete()
    {
        $BRole = BRole::findOrFail(request('id'));

        $deleteKey = 'deleteVkVm1aPU2xXNXdyYTQ1PSIbsInZhb2HVlcI0003deleteMenu';
        $deleteKey1 = 'deleteNJcV1888AaRHp1NkxnPT0iLCJ12YW3dx1ZSI6000bdeleteMenu';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            $BPermissionRole = BPermissionRole::where('role_id', request('id'));

            if($BPermissionRole->count() > 0)
            {
            	$BPermissionRole->delete();
            }

            // 事务处理
            if($BRole->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }

	// 角色权限关系页面
	public function permission(BRole $role)
	{
		// 获取所有权限
		$permissions = BPermission::all();

		// 获取当前角色权限
		$myPermissions = $role->permissions;

		return view("admin.role.permission", compact('permissions', 'myPermissions', 'role'));
	}

	// 储存角色权限行为
	public function storePermission(BRole $role)
	{
		if(!empty(request('permissions')))
		{
			$this->validate(request(), [
				'permissions' => 'required|array'
			]);
		}

		$permissions = BPermission::findMany(request('permissions'));
		$myPermissions = $role->permissions;

		// 对已经有的权限
		$addPermissions = $permissions->diff($myPermissions);
		foreach($addPermissions as $permission) 
		{
			$role->grantPermission($permission);
		}

		$deletePermissions = $myPermissions->diff($permissions);
		foreach($deletePermissions as $permission)
		{
			$role->deletePermission($permission);
		}

		return back();
		// return redirect('/admin/roles');
	}
}