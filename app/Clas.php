<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
	public function users(){
		return $this->belongsTo('App\User');
	}
	public function questions(){
    return $this->hasMany('App\Question');
	}
	public function students(){
	return $this->hasMany('App\Student');
	}
	
    protected $table = "classes" ;
    protected $fillable = ["name" ];
}

