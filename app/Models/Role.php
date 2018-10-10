<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The users that belong to the role.
     */
    public function employees()
    {
        return $this->belongsToMany('App\Models\Employee', 'employee_role', 'role_id', 'employee_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permission', 'role_id', 'permission_id');
    }
}
