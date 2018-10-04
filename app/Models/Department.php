<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    public function manager()
    {
        return $this->belongsTo('App\Models\Employee', 'manager_id');
    }

    public function jobHistories()
    {
        return $this->hasMany('App\Models\JobHistory', 'department_id');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'department_id');
    }
}
