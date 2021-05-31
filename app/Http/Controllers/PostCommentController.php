<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\PostComment;

class PostCommentController extends Controller
{
    public function create()
    {
    	return request('content');
    	$this->validate(request(), [
            'title' => 'required|min:1'
        ]);

        PostComment::create([
            'content' => request('content'),
            'parent' => request('parent'),
            'good' => request('good'),
            'post_id' => request('b_posts_type_id'),
            // 'user_id' => Auth::guard("web")->id(),
            'check' => request('check'),
            'report' => request('report'),
        ]);

        return back();
    }
}
