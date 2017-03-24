<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAcc extends Model
{
	public function parents(){
		return $this->belongsTo('App\Parents');
	}
    protected $table = "main_student" ;
}
