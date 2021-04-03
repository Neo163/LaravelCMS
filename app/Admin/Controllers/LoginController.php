<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\BLog;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard("admin")->check())
        {
            return redirect('/admin/dashboard');
        }

        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $is_pc = (strpos($agent, 'windows nt')) ? true : false; 
         
        if($is_pc)
        {
            return view('admin.login.index-pc');
        } else {
            return view('admin.login.index-mobile');
        }

        return view('admin.login.index-pc');
    	
    }

	public function login(Request $request)
	{
        $this->validate(request(), [
            // 'name' => 'required|min:2',
            // 'password' => 'required|min:5|max:100',
        ]);

        $user = request(['name', 'password']);

        if(\Auth::guard("admin")->attempt($user)) {

        	$log = $request->isMethod('put') ? BLog::findOrFail($request->log_id) : new BLog;
            $log->id = $request->input('log_id');
            $log->title = $request->input('name');
            $log->description = 'Login suceesfully';
            $log->category = 'Login_logout';
            
            //strcasecmp 比较两个字符，不区分大小写。返回0，>0，<0。
            if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
                $ip = getenv('HTTP_CLIENT_IP');
            } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
                $ip = getenv('REMOTE_ADDR');
            } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            
            $ip_result =  preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';

            $log->ip = $ip_result;

            if( !$log->save() ) 
            { 
                echo 'false'; 
            }

            return redirect('/admin/dashboard');
        }

        return \Redirect::back()->withErrors("用户名密码不匹配");
	}

	public function logout(Request $request)
	{
		$log = $request->isMethod('put') ? BLog::findOrFail($request->log_id) : new BLog;
        $log->id = $request->input('log_id');
        $log->title = \Auth::guard("admin")->user()->name;
        $log->description = 'Logout suceesfully';
        $log->category = 'Login_logout';
        
        //strcasecmp 比较两个字符，不区分大小写。返回0，>0，<0。
        if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
            $ip = getenv('REMOTE_ADDR');
        } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $ip_result =  preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
        
        $log->ip = $ip_result;

        if( !$log->save() ) 
        { 
            echo 'false'; 
        }

		\Auth::guard("admin")->logout();

        return redirect('/admin/login');
	}
}
