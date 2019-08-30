<?php

namespace App\Observer;

use Illuminate\Support\Str;
use App\User;

class UserObserver
{
	public function creating(User $user)
	{
		$user->email_token = Str::random(10);
		$user->email_active = false;
	}
}
