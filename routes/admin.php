<?php

// 管理后台
Route::group(['prefix' => 'admin'], function(){

	// 登录展示页面
	Route::get('/login', '\App\Admin\Controllers\LoginController@index');
	// 登录行为
	Route::post('/login', '\App\Admin\Controllers\LoginController@login');
	// 登出行为
	Route::get('/logout', '\App\Admin\Controllers\LoginController@logout');

	Route::group(['middleware' => 'auth:admin'], function(){
		// 首页
		Route::get('/home', '\App\Admin\Controllers\HomeController@index');

		Route::group(['middleware' => 'can:system'], function(){
			// 管理人员模块
			Route::get("/users", "\App\Admin\Controllers\UserController@index");
			Route::get("/users/create", "\App\Admin\Controllers\UserController@create");
			Route::post("/users/store", "\App\Admin\Controllers\UserController@store");
			Route::get("/users/{user}/role", "\App\Admin\Controllers\UserController@role");
			Route::post("/users/{user}/role", "\App\Admin\Controllers\UserController@storeRole");

			// 角色
			Route::get("/roles", "\App\Admin\Controllers\RoleController@index");
			Route::get("/roles/create", "\App\Admin\Controllers\RoleController@create");
			Route::post("/roles/store", "\App\Admin\Controllers\RoleController@store");
			Route::get("/roles/{role}/permission", "\App\Admin\Controllers\RoleController@permission");
			Route::post("/roles/{role}/permission", "\App\Admin\Controllers\RoleController@storePermission");

			// 权限
			Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
		    Route::get('/permissions/create', '\App\Admin\Controllers\PermissionController@create');
		    Route::post('/permissions/store', '\App\Admin\Controllers\PermissionController@store');
		});

		Route::group(['middleware' => 'can:post'], function(){
			
			// 文章列表
			Route::get("/posts/list", "\App\Admin\Controllers\PostController@index");
			// 创建文章
			Route::get("/post/create", "\App\Admin\Controllers\PostController@create");
			Route::post("/posts/list", "\App\Admin\Controllers\PostController@store");

			Route::post("/post/image/upload", "\App\Admin\Controllers\PostController@imageUpload");

			Route::post("/post/uploadcoverimage", "\App\Admin\Controllers\PostController@coverImage");
			
			// 文章详情页
			Route::get("/post/{post}", "\App\Admin\Controllers\PostController@show");
			// 编辑文章
			Route::get("/post/{post}/edit", "\App\Admin\Controllers\PostController@edit");
			Route::put("/post/{post}", "\App\Admin\Controllers\PostController@update"); 

			Route::get('/posts/trashs/list', '\App\Admin\Controllers\PostController@trashs');
			Route::get('/post/{post}/trash', '\App\Admin\Controllers\PostController@trash');
			Route::get('/post/{post}/restore', '\App\Admin\Controllers\PostController@restore');
			Route::get("/post/{post}/delete", "\App\Admin\Controllers\PostController@delete");

			// 搜索
			Route::get('/search_display_post_id', '\App\Admin\Controllers\PostController@search_display_post_id');
			Route::get('/search_display_post_title', '\App\Admin\Controllers\PostController@search_display_post_title');
			Route::get('/search_display_post_category', '\App\Admin\Controllers\PostController@search_display_post_category');
			Route::get('/search_display_post_created_at', '\App\Admin\Controllers\PostController@search_display_post_created_at');

			Route::get('/search_hide_post_id', '\App\Admin\Controllers\PostController@search_hide_post_id');
			Route::get('/search_hide_post_title', '\App\Admin\Controllers\PostController@search_hide_post_title');
			Route::get('/search_hide_post_category', '\App\Admin\Controllers\PostController@search_hide_post_category');
			Route::get('/search_hide_post_created_at', '\App\Admin\Controllers\PostController@search_hide_post_created_at');

		
			// 审核模块
			Route::get('/posts', '\App\Admin\Controllers\PostController@index');
			Route::post('/posts/{post}/status', '\App\Admin\Controllers\PostController@status');
		});

		Route::group(['middleware' => 'can:page'], function(){
			
			// 文章列表
			Route::get("/pages/list", "\App\Admin\Controllers\PageController@index");
			// 创建文章
			Route::get("/page/create", "\App\Admin\Controllers\PageController@create");
			Route::post("/pages/list", "\App\Admin\Controllers\PageController@store");

			Route::post("/page/image/upload", "\App\Admin\Controllers\PageController@imageUpload");

			Route::post("/page/uploadcoverimage", "\App\Admin\Controllers\PageController@coverImage");
			
			// 文章详情页
			Route::get("/page/{page}", "\App\Admin\Controllers\PageController@show");
			// 编辑文章
			Route::get("/page/{page}/edit", "\App\Admin\Controllers\PageController@edit");
			Route::put("/page/{page}", "\App\Admin\Controllers\pageController@update"); 

			Route::get('/pages/trashs/list', '\App\Admin\Controllers\PageController@trashs');
			Route::get('/page/{page}/trash', '\App\Admin\Controllers\PageController@trash');
			Route::get('/page/{page}/restore', '\App\Admin\Controllers\PageController@restore');
			Route::get("/page/{page}/delete", "\App\Admin\Controllers\PageController@delete");

			// 搜索
			Route::get('/search_display_page_id', '\App\Admin\Controllers\PageController@search_display_page_id');
			Route::get('/search_display_page_title', '\App\Admin\Controllers\PageController@search_display_page_title');
			Route::get('/search_display_page_category', '\App\Admin\Controllers\PageController@search_display_page_category');
			Route::get('/search_display_page_created_at', '\App\Admin\Controllers\PageController@search_display_page_created_at');

			Route::get('/search_hide_page_id', '\App\Admin\Controllers\PageController@search_hide_page_id');
			Route::get('/search_hide_page_title', '\App\Admin\Controllers\PageController@search_hide_page_title');
			Route::get('/search_hide_page_category', '\App\Admin\Controllers\PageController@search_hide_page_category');
			Route::get('/search_hide_page_created_at', '\App\Admin\Controllers\PageController@search_hide_page_created_at');

		});

		Route::group(['middleware' => 'can:setting'], function(){
			Route::get("/setting", "\App\Admin\Controllers\SettingController@index");
		    Route::get("/setting/user/change_password", "\App\Admin\Controllers\SettingController@change_password");
		});

		Route::group(['middleware' => 'can:statistics'], function(){
			Route::get("/statistics", "\App\Admin\Controllers\StatisticsController@index");
		});

		Route::group(['middleware' => 'can:plan'], function(){
			Route::get('/plans', '\App\Admin\Controllers\PlanController@index');
		});

		Route::group(['middleware' => 'can:logs'], function(){
			Route::get('/logs', '\App\Admin\Controllers\LogController@index');
		});

		Route::group(['middleware' => 'can:topic'], function(){
			Route::resource('topics', '\App\Admin\Controllers\TopicController', ['only' => ['index', 'create', 'store', 'destroy']]);
		});

		Route::group(['middleware' => 'can:notice'], function(){
			Route::resource('notices', '\App\Admin\Controllers\NoticeController', ['only' => ['index', 'create', 'store']]);
		});
		

	});
	
});

