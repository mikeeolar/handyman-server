<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function providers() {
        return $this->belongsTo('App\Provider', 'provider_id', 'id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function bookings() {
        return $this->belongsTo('App\Booking', 'booking_id', 'id');
    }
}
