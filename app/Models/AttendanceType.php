<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceType extends Model
{
    public function attendances()
    {
        return $this->hasMany('App\Models\Attendence', 'type');
    }
}
