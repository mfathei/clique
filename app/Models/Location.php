<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company', 'location_id');
    }

    public function departments()
    {
        return $this->hasMany('App\Models\Department', 'location_id');
    }
}
