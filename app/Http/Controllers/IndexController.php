<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BUser;
use \App\Models\BPost;
use \App\Models\BPostParagraph;
use \App\Models\BParagraph;

class IndexController extends Controller
{
    public function index()
    {
        $data = array();

        $bPost = BPost::where('id', 1)->first();

        $view = $bPost->view;
        if($bPost->public == 'draft' && Auth::guard("admin")->id() != 0)
        {
            echo '<div style="position: fixed;right: 8%;top: 2%;padding: 8px 20px;background: yellow;border-radius: 5px;z-index: 1;font-size: 18px;">草稿</div>';
        } else
        {
            $view = $bPost->view+1;
            BPost::where('id', $bPost->id)->update([
                'view' => $view,
            ]);
        }

        $bData['view'] = $view;

        return view('web.page.templates.index', compact('bData', 'bPost'));
    }

    public function test()
    {
        return 'index';
    	$BPost = BPost::findOrFail(10);

    	$BPostParagraph = BPostParagraph::where('post_id', $BPost->id)->get();

        $data = array();
        foreach ($BPostParagraph as $key => $para)
        {
            $data[$para['title']] = $para['content'];
        }

    	return view('web.index.index', compact('BPost', 'data'));
    }
}
