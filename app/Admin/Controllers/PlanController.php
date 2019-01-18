<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
    	return view("admin/plan/index");
    }
}
