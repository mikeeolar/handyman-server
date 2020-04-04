<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $guarded = [];

    public function providerServices() {
        return $this->hasMany('App\ProviderService');
    }

    public function jobProfile() {
        return $this->hasOne('App\JobProfile', 'id', 'provider_id');
    }

    public function booking() {
        return $this->hasMany('App\Booking', 'id', 'provider_id');
    }
}
