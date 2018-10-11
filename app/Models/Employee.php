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

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'hire_date',
        'salary',
        'commission_pct',
        'job_id',
        'manager_id',
        'department_id',
        'email_verified_at',
        'password',
    ];

    // Dynamic attribute full_name
    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'] .' '. $this->attributes['last_name'];
    }

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
        return $this->belongsTo('App\Models\Department', 'department_id', 'id');
    }

    public function vacations()
    {
        return $this->hasMany('App\Models\Vacation', 'employee_id');
    }

    public function approvedVacations()
    {
        return $this->hasMany('App\Models\Vacation', 'approved_by');
    }

    public function attendances()
    {
        return $this->hasMany('App\Models\Attendance', 'employee_id');
    }
}
