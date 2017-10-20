<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DroneSubType extends Model
{
    public function DroneType()
    {
        return $this->belongsTo(DroneType::class,'drone_type_id','id');
    }
}
