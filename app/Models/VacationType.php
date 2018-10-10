<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacationType extends Model
{
    public function vacations()
    {
        return $this->hasMany('App\Models\Vacation', 'type');
    }
}
