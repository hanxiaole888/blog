<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\RegMail;
class UserController extends Controller
{
	public function __construct()
	{
		//未登录状态限制
		$this->middleware('auth',[
			'except'=>['index','show','create','store','confirmEmailtoken'] //这边是忽略文件
		]);
		//登录状态限制
		$this->middleware('guest',[
			'only'=>['create','store'] //这边是选择文件
		]);
	}
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //分页取数据
	    $users = User::paginate(10);
	    return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
	    return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    //验证规则
	    $data = $this->validate($request,[
		    'name'=>'required|min:3',//min:3至少3个字节
		    'email'=>'required|unique:users|email',//unique:users 是在users表里只能有一个 email 是邮箱类型
		    'password'=>'required|min:5|confirmed' //min:5至少5个字节 confirmed 是跟 password_confirmation 字段比对
	    ]);
	    $data['password'] = bcrypt($data['password']);
	    //添加用户
	    $user = User::create($data);
	    \Mail::to($user)->send(new RegMail($user));
	    session()->flash('success','请在邮箱验证信息');
	    return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
	    $blogs = $user->blogs()->paginate(10);
	    return view('user.show',compact('user','blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //模型攻略
	    $this->authorize('update',$user);

	    return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //验证规程
	    $this->validate($request,[
	    	'name'=>'required|min:3',
		    'password'=>'nullable|min:5|confirmed'
	    ]);
		//更新数据
	    $user->name = $request->name;
	    if($request->password){
		    $user->password = bcrypt($request->password);
	    }
	    $user->save();
	    session()->flash('success','修改成功！');
	    return redirect()->route('user.show',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
	    $this->authorize('delete',$user);
		$user->delete();
		session()->flash('success','删除成功');
		return redirect()->route('user.index');
    }

    public function confirmEmailtoken($token){
		$user = User::where('email_token',$token)->first();
		if($user){
			$user->email_active = true;
			$user->save();
			//自动登录
			\Auth::login($user);
			session()->flash('success','登录成功！');
			return redirect('/');
		}
	    session()->flash('danger','邮箱验证失败！');
	    return redirect('/');
    }
}
