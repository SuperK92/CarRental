<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortadaController extends Controller
{
    //funcion index carga la vista principal de la portada
    public function index()
    {
        //$marca = Marca::get();

        return view('portada', [
            //array con datos que pasas a la vista
        ]);
    }
}
