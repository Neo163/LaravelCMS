<?php

namespace App\Admin\Controllers;

use \App\AdminUser;
use \App\Post;
use \App\Page;

class HomeController extends Controller
{
	// 首页
	public function index()
	{
		$users = AdminUser::count();
		$posts = Post::where('recycle', '1')->count();
		$pages = Page::where('recycle', '1')->count();
		return view('admin.home.index', compact('users', 'posts', 'pages'));
	}

}