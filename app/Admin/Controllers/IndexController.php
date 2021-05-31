<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \App\Models\BMenu;
use \App\Models\BUser;
use \App\Models\User;
use \App\Models\BPost;
use \App\Models\BMedia;

class IndexController extends Controller
{
    public function index()
    {
    	$data = array();
    	
    	$data['bUsersCount'] = BUser::count();
    	$data['usersCount'] = User::count();
    	$data['bPost'] = BPost::where('b_posts_type_id', '>', 1)->count();
    	$data['bPage'] = BPost::where('b_posts_type_id', 1)->count();

        $data['bMedia'] = BMedia::count();
        $bMediaSize = BMedia::sum('size_count');
        $bMediaSize = $bMediaSize/(1024*1024*1024);
        $data['bMediaSize'] =  round($bMediaSize, 4).'G';

    	return view('admin.index.index', compact('data'));
    }
}
