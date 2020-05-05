<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	public function services() {
   		return $this->hasMany('App\Service', 'category_id', 'id');
   	}

   	public function providerServices() {
   	    return $this->hasMany('App\ProviderServices');                 
    }
}
