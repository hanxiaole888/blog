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

//Route::get('/', function () {
//    return view('welcome');
//});
//首页
Route::get('/','IndexController@index')->name('home');
//用户资源控制器
Route::resource('user','UserController');
//用户退出登录
Route::get('logout','LoginController@logout')->name('logout');
//用户登录页面
Route::get('login','LoginController@create')->name('login');
//用户登录页面
Route::post('login','LoginController@store')->name('login');
