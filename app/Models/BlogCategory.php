<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public function posts(){
    	return $this->hasMany('App\Models\BlogPost');
    }
}
