<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    //

    public function historico()
    {
        return $this->hasMany('App\Vehiculo_Historico');
    }

}
