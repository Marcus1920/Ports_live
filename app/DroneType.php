<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;

class DroneType extends Model
{
    public function Department()
    {
        return $this->belongsTo(Department::class,'department','id');
    }
<<<<<<< HEAD

=======
>>>>>>> f43e88f4aef2bfed5b13ef52e8850faab8012613
}
