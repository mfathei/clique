<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function manager()
    {
        return $this->belongsTo('App\Models\Employee', 'manager_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    public function departments()
    {
        return $this->hasMany('App\Models\Department', 'company_id');
    }
    
    public function settings()
    {
        return $this->hasMany('App\Models\Setting', 'company_id');
    }
}
