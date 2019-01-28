<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index() 
    {
    	return view('web.index.index');
    }

    // 测试API ajax post data给后端
    public function test(Request $request)
    {
        return view('web.index.test');
    }

    public function search_display_post_id(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '1'], ['id', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.index', compact('posts'));
    }
}
