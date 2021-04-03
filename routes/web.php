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

Route::get('/', '\App\Http\Controllers\IndexController@index');

Route::get('/about', '\App\Http\Controllers\PageController@about');

Route::get('/post', '\App\Http\Controllers\PostController@index');

Route::get('/post/{bpost}', '\App\Http\Controllers\PostController@detail');

Route::get('/test/{btest}', '\App\Http\Controllers\PostController@detail');

include_once('admin.php');