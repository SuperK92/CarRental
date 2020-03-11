<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo_Historico extends Model
{
    //

    protected $table = "vehiculos_historicos";

    public function oficina()
    {
        return $this->belongsTo('App\Oficina');
    }

    public function estado()
    {
        return $this->belongsTo('App\EstadoVehiculo');
    }

    public function vehiculo()
    {
        return $this->belongsTo('App\Vehiculo');
    }
}
