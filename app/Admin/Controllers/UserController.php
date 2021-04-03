<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BUser;
use \App\Models\BRole;
use \App\Models\BRoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = \App\Models\BUser::paginate(20);
        
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        $name = request('name');
        $password = request('password');

        if(request('password') != request('confirm_password'))
        {
            return back()->withErrors( '两次输入的密码不相同' );
        }

        $countName = BUser::where('name', request('name'))->count();

        if($countName > 0)
        {
            return back()->withErrors( '这个名字已经有人注册了' );
        }

        // BUser::create(compact('name', 'password'));

        BUser::create([
            'name' => request('name'),
            'password' => bcrypt(request('password')),
            'b_user_id' => Auth::guard("admin")->id(),
        ]);

        return redirect('/admin/users');
    }

    public function edit(BUser $user)
    {
        $roles = BRole::all();
        
        $myRoles = $user->roles;

        return view('admin.user.edit', compact('roles', 'myRoles', 'user'));
    }

    public function update(BUser $user)
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'roles' => 'required|array',
        ]);

        // $this->authorize('update_note', $note);

        // user role start
        $roles = BRole::find(request('roles'));
        $myRoles = $user->roles;

        // 对已经有的权限
        $addRoles = $roles->diff($myRoles);
        foreach ($addRoles as $role) {
            $user->roles()->save($role);
        }

        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $role) {
            $user->deleteRole($role);
        }
        // user role end

        $countName = BUser::where('name', request('name'))->count();

        if($countName > 0 && $user->name != request('name'))
        {
            return back()->withErrors( '这个名字已经有人注册了' );
        }

        $user->name = request('name');
        $user->b_user_id = Auth::guard("admin")->id();
        $user->save();

        // password start
        if(!empty(request('old_password')))
        {
            $old_password = request('old_password');
            $new_password = request('new_password');

            // 输入的密码和旧密码不相同
            if(!Hash::check($old_password, $user->password))
            {
                return back()->withErrors( '你输入的密码和旧密码不一致' );
            }

            if(request('new_password') != request('confirm_password'))
            {
                // 再次输入的密码不相同
                return back()->withErrors( '你两次输入的新密码不相同' );
            }

            if(request('new_password') == request('confirm_password'))
            {
                // 新密码和旧密码相同
                if(Hash::check($new_password, $user->password))
                {
                    return back()->withErrors( '你输入的新密码和旧密码相同' );
                }

                // 更新密码
                $update = array(
                  'password'  => bcrypt($new_password),
                );

                $changePassword = BUser::where('id', $user->id)->update($update);

                if(!$changePassword)
                {
                    return back()->withErrors( '密码更新失败' );
                }

            }
            // password end
        }

        return back()->withErrors( '更新成功' );
    }

    public function delete()
    {
        // $this->authorize('delete', $user);

        if(request('user_id') == request('id'))
        {
            return '不可删除自己账号';
        }

        $user = BUser::findOrFail(request('id'));

        if ( request('user') != request('id') && request('deleteKey') == 'deleteAEzBQMmYgrjjHI0ql69i1Q8' && request('deleteKey1') == 'deleteAEzBQMmaYgrjdjHSI0gql69Ai1Q8' )
        {
            $userRole = BRoleUser::where('user_id', request('id'));

            if($userRole->count() > 0)
            {
                $userRole->delete();
            }

            if($user->delete()) 
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}
