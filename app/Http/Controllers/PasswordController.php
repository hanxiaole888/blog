<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\FindPasswordNotify;
class PasswordController extends Controller
{
    //
	public function email(){
		return view('password.email');
	}
	public function send(Request $request){
		$data = $this->validate($request,[
			'email'=>'required|email'
		]);
		$user = User::where('email',$data['email'])->first();
		\Notification::send($user,new FindPasswordNotify($user->email_token));
		return view('password.send');
	}
	public function edit($token){
		$user = $this->getUserByToken($token);
		return view('password.edit',compact('user'));
	}
	public function update(Request $request){
		//验证规则
		$data = $this->validate($request,[
			'password'=>'required|min:5|confirmed' //min:5至少5个字节 confirmed 是跟 password_confirmation 字段比对
		]);
		$user = $this->getUserByToken($request->token);
		$user->password = bcrypt($data->password);
		$user->save();
		session()->flash('success','修改密码成功！');
		return redirect()->route('login');
	}
	protected function getUserByToken($token){
		return User::where('email_token',$token)->first();
	}
}
