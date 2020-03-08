<?php

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


Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');



Route::middleware('auth')->group(function () {
    
});

// 前端畫面-使用者
Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@destroy');

// 前端畫面-無限制
Route::get('/', 'FrontController@index');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/category/{category}','FrontController@indexWithCategory');


// 後臺管理者
Route::resource('/admin/categories','CategoryController')->except(['show'])->middleware('can:isAdmin');
Route::resource('/admin/tags','TagController')->only(['index','destroy'])->middleware('can:isAdmin');
Route::get('/admin/posts', 'PostController@indexByAdmin')->middleware('can:isAdmin');
Route::delete('/admin/posts/{post}', 'PostController@destroyByAdmin')->middleware('can:isAdmin');



