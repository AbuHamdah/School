<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public function questions(){
    return $this->hasMany('App\Question');
	}
	public function classes(){
	return $this->belongsTo('App\Class');
	}
    protected $table = "students" ;
    protected $fillable = ["name" ];
}
