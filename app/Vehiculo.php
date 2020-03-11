<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    //
    public function modelo()
    {
        return $this->belongsTo('App\Modelo');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }


    public function transmision()
    {
        return $this->belongsTo('App\Transmision');
    }

    public function combustible()
    {
        return $this->belongsTo('App\Combustible');
    }

    public function historico()
    {
        return $this->hasmany('App\Vehiculo_Historico');
    }

}
