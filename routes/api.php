<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', /*'auth:web'*/] ], function () 
{
	Route::post('/admin/user/delete', '\App\Admin\Controllers\UserController@delete');

	// menu
	Route::get('/admin/menu', '\App\Admin\Controllers\MenuController@data');
	Route::post('/admin/menu/createEdit', '\App\Admin\Controllers\MenuController@createEdit');
	Route::post('/admin/menu/change', '\App\Admin\Controllers\MenuController@change');
	Route::post('/admin/menu/delete', '\App\Admin\Controllers\MenuController@delete');

	Route::post('/admin/menuCategory/update', '\App\Admin\Controllers\MenuCategoryController@update');
	Route::post('/admin/menuCategory/delete', '\App\Admin\Controllers\MenuCategoryController@delete');

	Route::post('/admin/menuLocation/update', '\App\Admin\Controllers\MenuLocationController@update');
	Route::post('/admin/menuLocation/delete', '\App\Admin\Controllers\MenuLocationController@delete');

	Route::post('/menuCategory/sorting', '\App\Admin\Controllers\MenuCategoryController@menuCategorySorting');
	Route::post('/menuLocation/sorting', '\App\Admin\Controllers\MenuCategoryController@menuLocationSorting');

	// user role and permission
	Route::post("/admin/role/update", "\App\Admin\Controllers\RoleController@update");
	Route::post("/admin/role/delete", "\App\Admin\Controllers\RoleController@delete");

	Route::post("/admin/permission/update", "\App\Admin\Controllers\PermissionController@update");
	Route::post("/admin/permission/delete", "\App\Admin\Controllers\PermissionController@delete");

	// paragraph
	Route::post("/admin/paragraph/update", "\App\Admin\Controllers\ParagraphController@update");
	Route::post("/admin/paragraph/delete", "\App\Admin\Controllers\ParagraphController@delete");

	Route::get("/admin/paragraph", "\App\Admin\Controllers\ParagraphController@getData");
	Route::post("/admin/paragraph/update", "\App\Admin\Controllers\ParagraphController@updateData");

	// media
	Route::get('/admin/mediaCategory', '\App\Admin\Controllers\MediaCategoryController@data');
	Route::post('/admin/mediaCategory/createEdit', '\App\Admin\Controllers\MediaCategoryController@createEdit');
	Route::post('/admin/mediaCategory/change', '\App\Admin\Controllers\MediaCategoryController@change');
	Route::post('/admin/mediaCategory/delete', '\App\Admin\Controllers\MediaCategoryController@delete');

	Route::post('/admin/media/delete', '\App\Admin\Controllers\MediaController@delete');
	Route::post('/admin/media/update', '\App\Admin\Controllers\MediaController@update');

	Route::post("/media/mediaUpload", "\App\Admin\Controllers\MediaController@mediaUploadApi");

	Route::get('/admin/media/select/data', '\App\Admin\Controllers\MediaController@mediaData');
	Route::get('/admin/media/select/category/{category}', '\App\Admin\Controllers\MediaController@mediaCategory');

	// page
	Route::post('/admin/page/content/status/{bpage}', '\App\Admin\Controllers\PageController@contentStatus');
	Route::get('/admin/page/edit', '\App\Admin\Controllers\PageController@editData');

	Route::post('/admin/page/delete', '\App\Admin\Controllers\PageController@delete');

	// post
	Route::post('/admin/post/content/status/{bpost}', '\App\Admin\Controllers\PostController@contentStatus');
	Route::get('/admin/post/edit', '\App\Admin\Controllers\PostController@editData');

	Route::post('/admin/post/delete', '\App\Admin\Controllers\PostController@delete');

	// post type
	Route::get('/admin/posts/type', '\App\Admin\Controllers\PostTypeController@data');
	Route::post('/admin/posts/type/createEdit', '\App\Admin\Controllers\PostTypeController@createEdit');
	Route::post('/admin/posts/type/change', '\App\Admin\Controllers\PostTypeController@change');
	Route::post('/admin/posts/type/delete', '\App\Admin\Controllers\PostTypeController@delete');

	// post category
	Route::get('/admin/posts/categories', '\App\Admin\Controllers\PostCategoryController@data');
	Route::post('/admin/posts/categories/createEdit', '\App\Admin\Controllers\PostCategoryController@createEdit');
	Route::post('/admin/posts/categories/change', '\App\Admin\Controllers\PostCategoryController@change');
	Route::post('/admin/posts/categories/delete', '\App\Admin\Controllers\PostCategoryController@delete');

	// post tag
	Route::get('/admin/posts/tags', '\App\Admin\Controllers\PostTagController@data');
	Route::post('/admin/posts/tags/createEdit', '\App\Admin\Controllers\PostTagController@createEdit');
	Route::post('/admin/posts/tags/change', '\App\Admin\Controllers\PostTagController@change');
	Route::post('/admin/posts/tags/delete', '\App\Admin\Controllers\PostTagController@delete');

	Route::get('/admin/template/data/templates', '\App\Admin\Controllers\TemplateController@data');
	Route::post('/admin/template/delete', '\App\Admin\Controllers\TemplateController@delete');


	// test
	Route::post('/sorting', '\App\Admin\Controllers\DemoController@sorting');

});