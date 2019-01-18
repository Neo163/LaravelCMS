<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \App\AdminUser;

class SettingController extends Controller
{
	public function index()
    {
        return view('/admin/setting/index');
    }

    public function change_password(Request $request)
    {
    	$this->validate(request(), [
            'password' => 'required'
        ]);

        $change = AdminUser::where('name', \Auth::guard("admin")->user()->name)->update([ 'password' => bcrypt(request('password')) ]);

        if ( $change )
        {
            return redirect("admin/setting")->withErrors("修改密码成功");
        } else 
        {
            return redirect("admin/setting")->withErrors("修改密码失败");
        }
    }
}
