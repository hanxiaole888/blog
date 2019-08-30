<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //数据填充时候用到
	protected $fillable = ['content'];

	public function user(){
		return $this->belongsTo(User::class);
	}
}
