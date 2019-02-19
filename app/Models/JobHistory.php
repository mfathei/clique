<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    public function job()
    {
        return $this->belongsTo('App\Models\Job', 'job_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
}
