<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoVehiculo extends Model
{
    //
    // public function vehiculos()
    // {
    //     return $this->hasMany('App\Vehiculo');
    // }

    public function historico()
    {
        return $this->hasMany('App\Vehiculo_Historico');
    }

}
