<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }
}
