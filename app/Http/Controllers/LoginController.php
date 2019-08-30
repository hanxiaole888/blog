<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class LoginController extends Controller
{
    //登录页面
	public function create(){
		return view('Login.create');
	}
	//登录数据审核
	public function store(Request $request){
		//验证规则
		$data = $this->validate($request,[
			'email'=>'required|email',
			'password'=>'required|min:5'
		]);

		if(\Auth::attempt($data)){
			session()->flash('success','登录成功!');
			return redirect('/');
		}
		session()->flash('error','登录失败!');
		return back();

	}
	//退出登录
	public function logout(){
		\Auth::logout();
		session()->flash('success','退出成功!');
		return redirect('/');
	}
}
