<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transmision extends Model
{
    //
    public function vehiculos()
    {
        return $this->hasMany('App\Vehiculo');
    }
}
