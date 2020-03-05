<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    //
    public function vehiculos()
    {
        return $this->hasMany('App\Vehiculo');
    }
}
