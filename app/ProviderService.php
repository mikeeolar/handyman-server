<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderService extends Model
{
    public function providers() {
        return $this->belongsTo('App\Provider', 'provider_id', 'id');
    }

    public function categories() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function services() {
        return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
