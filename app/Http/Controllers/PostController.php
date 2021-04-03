<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\BPost;
use \App\Models\BPostParagraph;

class PostController extends Controller
{
    public function index()
    {
    	return view('web.post.index');
    }

    public function detail(BPost $bpost)
    {
        $BPostParagraph = BPostParagraph::where('post_id', $bpost->id)->get();

        $data = array();
        foreach ($BPostParagraph as $key => $para)
        {
            $data[$para['title']] = $para['content'];
        }

        return view('web.post.templates.default', compact('bpost', 'data'));
    }
}
