<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function categories() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function services() {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
