<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobProfile extends Model
{
    protected $guarded = [];

    public function providers() {
        return $this->belongsTo('App\Provider', 'provider_id', 'id');
    }
//    public function()
}
