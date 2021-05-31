<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'setting'], function ()
{
	Route::get('/', '\App\Http\Controllers\IndexController@index');

	Route::get('/post/{bPostType}/{bPost}', '\App\Http\Controllers\PostController@detail');

	Route::get('/test/{btest}', '\App\Http\Controllers\PostController@detail');

	Route::get('/mail','\App\Http\Controllers\MailController@qqEmail');
	Route::get('/email', '\App\Http\Controllers\MailController@gmail');

	include_once('admin.php');
});
