<?php

// 后台url，前序为creative
Route::group(['prefix' => 'admin'], function()
{
	Route::get('/test', '\App\Admin\Controllers\DemoController@test');

	// 登录 暂定一个login
	Route::get('/login', '\App\Admin\Controllers\LoginController@index')->name('login');
	// 登录行为
	Route::post('/login', '\App\Admin\Controllers\LoginController@login');
	// 登出
	Route::get('/logout', '\App\Admin\Controllers\LoginController@logout');

	// 登入后的页面
	Route::group(['middleware' => 'auth:admin'], function(){

		// 后台首页
		Route::get('/dashboard', '\App\Admin\Controllers\IndexController@index');

		// Route::group(['middleware' => 'can:system'], function(){
			// 管理人员模块
			Route::get("/users", "\App\Admin\Controllers\UserController@index");
			// Route::get("/user/add", "\App\Admin\Controllers\UserController@add");
			Route::post("/user/create", "\App\Admin\Controllers\UserController@create");
			Route::get("/user/{user}/edit", "\App\Admin\Controllers\UserController@edit");
			Route::post("/user/{user}/update", "\App\Admin\Controllers\UserController@update");
			// Route::get("/user/{user}/role", "\App\Admin\Controllers\UserController@role");
			// Route::post("/user/{user}/role", "\App\Admin\Controllers\UserController@storeRole");

			// 角色
			Route::get("/roles", "\App\Admin\Controllers\RoleController@index");
			Route::post("/role/create", "\App\Admin\Controllers\RoleController@create");

			// 角色权限
			Route::get("/role/{role}/permission", "\App\Admin\Controllers\RoleController@permission");
			Route::post("/role/{role}/permission", "\App\Admin\Controllers\RoleController@storePermission");

			// 权限
			Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
		    Route::post('/permission/create', '\App\Admin\Controllers\PermissionController@create');
		// });

		Route::group(['middleware' => 'can:media'], function()
		{	
			Route::get("/media", "\App\Admin\Controllers\MediaController@index");

			Route::post("/media/mediaUpload", "\App\Admin\Controllers\MediaController@mediaUpload");
			Route::post("/media/mediaUploadApi", "\App\Admin\Controllers\MediaController@mediaUploadApi");
			
			Route::get('/media/category/{bMediaCategory}', '\App\Admin\Controllers\MediaController@category');
		});

		// Route::group(['middleware' => 'can:setting'], function()
		// {
			Route::get("/setting", "\App\Admin\Controllers\SettingController@setting");
			// Route::get("/setting", "\App\Admin\Controllers\SettingController@development");

			Route::post("/setting", "\App\Admin\Controllers\SettingController@create");

			Route::get("/information", "\App\Admin\Controllers\SettingController@information");

			Route::get("/sliders", "\App\Admin\Controllers\SettingController@development");
			Route::get("/google/analysis", "\App\Admin\Controllers\SettingController@development");
		
		// });

		Route::group(['middleware' => 'can:menu'], function()
		{
			Route::get("/menus", "\App\Admin\Controllers\MenuCategoryController@index");

			Route::get("/menu/{bmenu}", "\App\Admin\Controllers\MenuController@index");

			Route::get("/menu1", "\App\Admin\Controllers\MenuController@test");

			Route::post("/menuCategory/create", "\App\Admin\Controllers\MenuCategoryController@create");

			Route::post("/menuLocation/create", "\App\Admin\Controllers\MenuLocationController@create");
		
		});

		// Route::group(['middleware' => 'can:post'], function()
		// {
			Route::get("/posts/type/{bPostType}", "\App\Admin\Controllers\PostController@index");
			Route::get("/post/type/add/{bPostType}", "\App\Admin\Controllers\PostController@add");
			Route::get("/post/type/edit/{bPostType}/{bpost}", "\App\Admin\Controllers\PostController@edit");
			Route::post("/post/type/{bPostType}/{post}/update", "\App\Admin\Controllers\PostController@update");

			// Route::post("/post/type/{bPostType}/create", "\App\Admin\Controllers\PostController@create");
			Route::post("/post/create", "\App\Admin\Controllers\PostController@create");

			// Route::post("/post/type/{bPostType}/update", "\App\Admin\Controllers\PostController@update");
			Route::post("/post/update/{bpost}", "\App\Admin\Controllers\PostController@update");

			Route::post("/post/image/upload", "\App\Admin\Controllers\MediaController@imageUpload");
		
		// });

		// Route::group(['middleware' => 'can:postType'], function()
		// {
			Route::get("/posts/types", "\App\Admin\Controllers\PostTypeController@index");
		
		// });

		// Route::group(['middleware' => 'can:postCategory'], function()
		// {	
			Route::get("/posts/categories", "\App\Admin\Controllers\PostCategoryController@index");
			Route::get("/posts/categories/type/{bPostType}", "\App\Admin\Controllers\PostCategoryController@posts_categories");
		
		// });

		// Route::group(['middleware' => 'can:postCategory'], function(){
			
			// 菜单
			Route::get("/posts/tags", "\App\Admin\Controllers\PostTagController@index");
			Route::get("/posts/tags/type/{bPostType}", "\App\Admin\Controllers\PostTagController@posts_tags");
		
		// });

		// Route::group(['middleware' => 'can:template'], function()
		// {
			Route::get("/templates", "\App\Admin\Controllers\TemplateController@template");
			Route::get("/template/add", "\App\Admin\Controllers\TemplateController@add");
			Route::post("/template/create", "\App\Admin\Controllers\TemplateController@create");
			Route::get("/template/{template}/edit", "\App\Admin\Controllers\TemplateController@edit");
			Route::post("/template/{template}/update", "\App\Admin\Controllers\TemplateController@update");
		// });

		// Route::group(['middleware' => 'can:paragraph'], function()
		// {
			Route::get("/paragraphs", "\App\Admin\Controllers\ParagraphController@index");
			Route::post("/paragraph/create", "\App\Admin\Controllers\ParagraphController@create");
		
		// });

		// Route::group(['middleware' => 'can:comments'], function()
		// {
			Route::get("/comments/{status}", "\App\Admin\Controllers\CommentController@comments");
			// Route::get("/comments/recycle", "\App\Admin\Controllers\CommentController@recycle");
			Route::post("/comment/reply", "\App\Admin\Controllers\CommentController@reply");
		
		// });

			// test
			Route::get('/demo/{demo}', '\App\Admin\Controllers\DemoController@demo');
			Route::get('/test/{test}', '\App\Admin\Controllers\TestController@test');

			Route::get('/mail', '\App\Admin\Controllers\TestController@mailSend');

			Route::get('/sorting', '\App\Admin\Controllers\DemoController@sorting_page');
			Route::get('/proup_image', '\App\Admin\Controllers\DemoController@proup_image');

	});

});