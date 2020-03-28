<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobProfile extends Model
{
    protected $guarded = [];

    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
//    public function()
}
