<?php

namespace App\Admin\Controllers;

use \App\Models\BUser;
use \App\Models\BComment;

class CommentController extends Controller
{
	// 权限列表页面
	public function index()
	{
		$comments = BComment::paginate(20);

		return view("admin.comment.index", compact('comments'));
	}

    public function add()
    {
        return view("admin.comment.add");
    }

	// 创建权限实际行为
	public function create()
	{
		$this->validate(request(), [
			'title' => 'required|min:1'
		]);

		BPermission::create([
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

        $updateKey = 'upda1tebAEzsBQAMAaadfa1aFjsaaDssfjHI0qGFcdsf33Sss1S3UpdaFsteM2enu';
        $updateKey1 = 'u1pAdaateAEzdBSQaMASsmaYScDgsrjbdjHFaSsI0ga3fqF33F3U1pfdSSaatefM3enu';

        if ( request('updateKey') == $updateKey && request('updateKey1') == $updateKey1 )
        {
            BPermission::where( 'id', request('id') )->first()->update([
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
        $BPermission = BPermission::findOrFail(request('id'));

        $deleteKey = 'del1eteVkVm1aPU2xXNQXdyYTQ1PSID1ETaf5678bsInZhb2HVlcI0003deleteM1enu';
        $deleteKey1 = 'dele1teNJcV1888AaRHp1NkxadgfnPT0iLC24678J12YW3dx1ZSI6000bdeleteM2enu';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            $BPermissionRole = BPermissionRole::where('permission_id', request('id'));

            if($BPermissionRole->count() > 0 )
            {
                $BPermissionRole->delete();
            }

            // 事务处理
            if($BPermission->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}