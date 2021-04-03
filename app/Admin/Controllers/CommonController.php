<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function menu()
    {
    	return view('admin.common.menu');
    }
}
