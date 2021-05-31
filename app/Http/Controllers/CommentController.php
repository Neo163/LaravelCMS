<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\BComment;

class CommentController extends Controller
{
	public function report()
    {
        $data = array();
        $data['report'] = 'Fail';

        $commentKey = 'AEzBQMmYg1adsfdsASDFDSFS1888111comment';

        if ( request('commentKey') == $commentKey )
        {
            BComment::where( 'id', request('id') )->update([
                'report' => request('report'),
            ]);

            $data['report'] = 'Reported';
        }

        return $data;
    }

    public function create()
    {
        $commentKey = 'AEzBQMmYg1adsfdsASDFDSFS1888111comment';

        if ( request('commentKey') == $commentKey )
        {
            $this->validate(request(), [
	            'content' => 'required|min:1'
	        ]);
            
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
            
            $ip =  preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';

            $check = 0; // 未检查
            if(request('remark') == 'admin_reply')
            {
                $check = 1;
            }

            if(request('parent') == '' || request('parent') == null)
            {
                $parent = 0;
            } else
            {
                $parent = request('parent');
            }

	        BComment::create([
	            'content' => request('content'),
                'category' => request('category'),
                'username' => request('username'),
	            'user_id' => 0,
                'b_post_id' => request('id'),
	            'status' => $check,
                'ip' => $ip,
                'parent' => $parent,
                // 'parent_reply' => request('parent_reply'),
                'ranking' => request('ranking'),
                'language_id' => request('language_id'),
                'remark' => request('remark'),
	        ]);

	        $data = array();

	        $data['username'] = request('username');

	        return $data;
        }

        return 'CommentKey incorrect';
    }
}
