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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('signup','UsersController@create')->name('signup');
Route::resource('users','UsersController');

//显示登录表单页面
Route::get('login', 'SessionsController@create')->name('login');
//处理用户提交的登录表单数据内容
Route::post('login', 'SessionsController@store')->name('login');
//处理用户的退登请求
Route::delete('logout', 'SessionsController@destroy')->name('logout');

//用户的激活功能设定的路由
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//填写email的表单
Route::get('password/reset',  'PasswordController@showLinkRequestForm')->name('password.request');
//处理表单提交，成功的话就发送邮件，附带token链接
Route::post('password/email',  'PasswordController@sendResetLinkEmail')->name('password.email');

//显示更新密码的表单包含token
Route::get('password/reset/{token}',  'PasswordController@showResetForm')->name('password.reset');
//对提交过来的token和email数据进行配对，正确的话就更新密码
Route::post('password/reset',  'PasswordController@reset')->name('password.update');

Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);

//粉丝列表的路由和用户关注者列表的路由
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');

//关注用户和取消用户
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');
