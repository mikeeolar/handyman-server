<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   	// protected $guarded = [];

   	public function categories() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function providerServices() {
        return $this->hasMany('App\ProviderService');
    }
}
