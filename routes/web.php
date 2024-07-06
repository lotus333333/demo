<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//接下来要构建三个静态页面分别是主页、帮助页、关于页。因此我们需要为路由指定好三个不同的 URL
//直接写控制器名称不行 要写完整的命名空间的位置
Route::get('/', 'App\Http\Controllers\StaticPagesController@home')->name('home');
Route::get('/help', 'App\Http\Controllers\StaticPagesController@help')->name('help');
Route::get('/about', 'App\Http\Controllers\StaticPagesController@about')->name('about');
Route::get('signup','App\Http\Controllers\UsersController@create')->name('signup');
Route::resource('users','App\Http\Controllers\UsersController');

Route::get('login', 'App\Http\Controllers\SessionsController@create')->name('login');
Route::post('login', 'App\Http\Controllers\SessionsController@store')->name('login');
Route::delete('logout', 'App\Http\Controllers\SessionsController@destroy')->name('logout');

Route::get('signup/confirm/{token}', 'App\Http\Controllers\UsersController@confirmEmail')->name('confirm_email');
