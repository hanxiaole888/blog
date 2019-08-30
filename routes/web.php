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
//邮件验证
Route::get('confirmEmailtoken/{token}','UserController@confirmEmailtoken')->name('confirmEmailtoken');
//找回密码填写邮箱
Route::get('FindPasswordEmail','PasswordController@email')->name('FindPasswordEmail');
//找回密码提交邮箱
Route::post('FindPasswordSend','PasswordController@send')->name('FindPasswordSend');
//找回密码填写密码
Route::get('FindPasswordEdit/{token}','PasswordController@edit')->name('FindPasswordEdit');
//找回密码提交修改密码
Route::post('FindPasswordUpdate','PasswordController@update')->name('FindPasswordUpdate');
//博客资源控制器
Route::resource('blog','BlogController');
