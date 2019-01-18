<?php

namespace App\Admin\Controllers;

use \App\Log;

class LogController extends Controller
{
	public function index()
    {
        $logs = Log::orderBy('created_at', 'desc')->paginate(20);
    	return view('admin.log.index', compact('logs'));
    }
}