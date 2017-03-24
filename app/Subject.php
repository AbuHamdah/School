<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	public function questions(){
    return $this->hasMany('App\Question');
	}
	public function users(){
		return $this->belongsTo('App\User');
	}
	//return $this->belongsToMany('App\Student');
    protected $table = "subjects" ;
    protected $fillable = ["name"];
}
