<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   	protected $guarded = [];

   	public function category() {
   		return $this->belongsTo('App\Category');
   	}

    public function providerServices() {
        return $this->hasMany('App\ProviderService');
    }
}
