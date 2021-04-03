<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BParagraph;

class SettingController extends Controller
{
    public function setting()
    {
    	$setting = BParagraph::where('id', 1)->first()->content;

    	date_default_timezone_set("Asia/Shanghai");
    	
    	$timeId = date("Y-m-d_h-i"); // date("Y-m-d h:i:sa")

    	return view('admin.setting.setting', compact('setting', 'timeId'));
    }

    public function information()
    {
    	return view('admin.setting.information');
    }

    public function development()
    {
    	return view('admin.setting.development');
    }
}
