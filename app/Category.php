<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	public function services() {
   		return $this->hasMany('App\Service', 'category_id', 'id');
   	}

   	public function userServices() {
   	    return $this->hasMany('App\UserServices');                 
    }
}
