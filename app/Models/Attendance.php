<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function attendanceType()
    {
        return $this->belongsTo('App\Models\AttendenceType', 'type');
    }
}
