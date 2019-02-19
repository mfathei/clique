<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_permission', 'permission_id', 'role_id');
    }
}
