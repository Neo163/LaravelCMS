<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BUser;
use \App\Models\BPage;
use \App\Models\BPageParagraph;

class PageController extends Controller
{
    public function about()
    {
    	$id = 10;
    	$bpage = BPage::findOrFail($id);

    	$BPageParagraph = BPageParagraph::where('page_id', $id)->get();

        $data = array();
        foreach ($BPageParagraph as $key => $para)
        {
            $data[$para['title']] = $para['content'];
        }

    	return view('web.page.about', compact('bpage', 'data'));
    }
}
