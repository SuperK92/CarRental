<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservaController extends Controller
{
    //

    public function index(Request $request)
    {
        //request permite coger variables get, post y de session

        if (!Session::get('oficina')) {
            return redirect('/'); //si no tiene sesion lo mandamos a portada, porque sin fecha no hay reserva
        }

        //dd(Session::get('oficina')); //dd significa die and dump en un solo comando

        $fecha_recogida = Session::get('fecha_recogida');
        $fecha_devolucion = Session::get('fecha_devolucion');

        $modelos_escogidos = array();

        $coches = Vehiculo::where('estado_vehiculo_id', 1)->orderBy('categoria_id')->get()->unique('modelo_id');

        // dd($coches);

        return view('reserva.index', [
            'coches'    =>      $coches,
            'numDias'   =>      Session::get('num_dias')
        ]); //carpeta reserva, fichero index
    }

    public function reserva(Request $request, $paso)
    {

        $step = str_replace("paso", "", $paso);
        $step = intval($step);

        switch ($step) {

            case 1:
                $fecha_recogida = strtotime($this->transformarfecha($request->fecha_recogida));
                $fecha_devolucion = strtotime($this->transformarfecha($request->fecha_devolucion));

                //calcular el numero de días
                $datediff = $fecha_devolucion - $fecha_recogida;
                $numDias = round($datediff / (60 * 60 * 24));

                //crea las sesiones
                Session::put("oficina", $request->oficina);
                Session::put("fecha_recogida", $fecha_recogida);
                Session::put("fecha_devolucion", $fecha_devolucion);
                Session::put("num_dias", $numDias);
                Session::save();

                return redirect('reservar-vehiculo');
                break;

            case 2:

                $coche_escogido = Vehiculo::where('id', intval($request->coche))->first();

                if ($coche_escogido->estado != 1) {
                    back()->withErrors(['msg', 'este coche no está disponible, vuelva a intentarlo']);
                }

                Session::put("vehiculo", $coche_escogido->toArray());
                Session::save();

                return redirect('reservar-cliente');

                break;

            case 3:

                dd($request);

                break;
        }
    }

    public function transformarfecha($fecha)
    {
        $piezas = explode('/', $fecha);
        return $piezas[1] . "/" . $piezas[0] . "/" . $piezas[2];
    }

    public function cliente(Request $request)
    {  //request porque coge sesiones



        return view('reserva.cliente', []); //carpeta reserva, fichero index
    }
}
