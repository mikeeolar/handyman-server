<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
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

    // public function job() {
    //     return $this->hasMany('App\Job', 'id', 'provider_id');
    // }
}
