<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    public function vacationType()
    {
        return $this->belongsTo('App\Models\VacationType', 'type');
    }
}
