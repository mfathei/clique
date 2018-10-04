<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'job_id');
    }

    public function jobHistories()
    {
        return $this->hasMany('App\Models\JobHistory', 'job_id');
    }
}
