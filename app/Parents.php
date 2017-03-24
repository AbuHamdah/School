<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
     protected $table = "parent" ;
	public function Stu(){
	return $this->hasMany('App\StudentAcc');
	}
}
