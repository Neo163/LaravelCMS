<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BUser;
use \App\Models\BPage;
use \App\Models\BPageParagraph;
use \App\Models\BParagraph;

class IndexController extends Controller
{
    public function index()
    {
        return view('web.index.index');
    }

    public function test()
    {
        return 'index';
    	$bpage = BPage::findOrFail(10);

    	$BPageParagraph = BPageParagraph::where('post_id', $BPage->id)->get();

        $data = array();
        foreach ($BPageParagraph as $key => $para)
        {
            $data[$para['title']] = $para['content'];
        }

    	return view('web.index.index', compact('bpage', 'data'));
    }
}
