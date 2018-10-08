<?php
declare(strict_types=1);

use App\Models\Employee;

function hasRole(int $id, int $department_id = -1): bool
{
    $user_id = Auth::user()->id;
    // Admin role
    $admin = Employee::where('id', $user_id)->whereHas('roles', function ($query) {
        $query->where('name', '=', 'admin');
    });

    if ($admin->count() > 0) {
        return true;
    }

    // Manager role
    $manager = Employee::where('id', $user_id)->whereHas('roles', function ($query) {
        $query->where('name', '=', 'manager');
    })->whereHas('department', function ($query) use ($department_id) {
        $query->where('id', '=', $department_id);
    });

    if ($manager->count() > 0) {
        return true;
    }

    if ($user_id === $id) {
        return true;
    }

    return false;
}
