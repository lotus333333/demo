<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/', 'App\Http\Controllers\StaticPagesController@home')->name('home');
Route::get('/help', 'App\Http\Controllers\StaticPagesController@help')->name('help');
Route::get('/about', 'App\Http\Controllers\StaticPagesController@about')->name('about');
Route::get('signup','App\Http\Controllers\UsersController@create')->name('signup');
Route::resource('users','App\Http\Controllers\UsersController');

//显示登录表单页面
Route::get('login', 'App\Http\Controllers\SessionsController@create')->name('login');
//处理用户提交的登录表单数据内容
Route::post('login', 'App\Http\Controllers\SessionsController@store')->name('login');
//处理用户的退登请求
Route::delete('logout', 'App\Http\Controllers\SessionsController@destroy')->name('logout');

//用户的激活功能设定的路由
Route::get('signup/confirm/{token}', 'App\Http\Controllers\UsersController@confirmEmail')->name('confirm_email');

//填写email的表单
Route::get('password/reset',  'App\Http\Controllers\PasswordController@showLinkRequestForm')->name('password.request');
//处理表单提交，成功的话就发送邮件，附带token链接
Route::post('password/email',  'App\Http\Controllers\PasswordController@sendResetLinkEmail')->name('password.email');

//显示更新密码的表单包含token
Route::get('password/reset/{token}',  'App\Http\Controllers\PasswordController@showResetForm')->name('password.reset');
//对提交过来的token和email数据进行配对，正确的话就更新密码
Route::post('password/reset',  'App\Http\Controllers\PasswordController@reset')->name('password.update');
