<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'employee_role', 'employee_id', 'role_id');
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company', 'manager_id');
    }

    public function jobHistories()
    {
        return $this->hasMany('App\Models\JobHistory', 'employee_id');
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job', 'job_id');
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'manager_id');
    }

    public function manager()
    {
        return $this->belongsTo('App\Models\Employee', 'manager_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
}
