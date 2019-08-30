<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
	public function index(){
//		$user = User::find(1);
//		\Mail::to($user)->send(new RegMail());
		$blog = new Blog();
		$data = $blog->orderBy('id','DESC')->with('user')->paginate(10);
		return view('index',compact('data'));
	}
}
