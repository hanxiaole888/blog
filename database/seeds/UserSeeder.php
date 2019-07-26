<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//	    \App\User::create([
//	    	'name'=> 'lisi',
//		    'email'=> 'lisi@qq.com',
//		    'password'=> bcrypt('admin888')
//	    ]);
	    factory(\App\User::class,100)->create();
	    $user = \App\User::find(1);
	    $user->name = '韩小乐';
	    $user->email = '321863396@qq.com';
	    $user->password = bcrypt('admin888');
	    $user->save();
	    $user = \App\User::find(2);
	    $user->name = '崔甜甜';
	    $user->email = '2897257988@qq.com';
	    $user->password = bcrypt('admin888');
	    $user->save();
    }
}
