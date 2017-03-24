<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
     protected $table = "book" ;
    protected $fillable = ["book_name", "book_price", "book_type", "book_author", "book_small_dis", "book_status", "book_meta", "book_large_des", "user_id", "book_num_pages"];
}
