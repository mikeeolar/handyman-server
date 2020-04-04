<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

	protected $guarded = [];

    public function providers() {
        return $this->belongsTo('App\Provider', 'provider_id', 'id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
