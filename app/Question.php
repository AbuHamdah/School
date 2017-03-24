<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	public function students(){
	return $this->belongsTo('App\Student');
	}
	public function classes(){
	return $this->belongsTo('App\Class');
	}
	public function subject(){
	
	return $this->belongsTo('App\Subject');
	}
    protected $table = "questions" ;
   
}

