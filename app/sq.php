<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sq extends Model
{
   protected $table = "student_question" ;
    protected $fillable = ["value"];
}
