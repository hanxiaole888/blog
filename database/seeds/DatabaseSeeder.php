<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
	    //用户
	    $this->call(UserSeeder::class);
	    //博客
	    $this->call(BlogSeeder::class);
    }
}
