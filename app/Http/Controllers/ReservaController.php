<?php

namespace App\Http\Controllers;

use App\Oficina;
use App\Reserva;
use App\User;
use App\Vehiculo;
use App\Vehiculo_Historico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

        $coches = Vehiculo::join('vehiculos_historicos', 'vehiculos.id', '=', 'vehiculos_historicos.vehiculo_id')
        ->where('vehiculos_historicos.estado_vehiculo_id' , 1)
        ->orderBy('categoria_id')->get()->unique('modelo_id');

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

                $total = Session::get('num_dias') * ($coche_escogido->categoria->precio_dia);

                Session::put("total", $total);
                Session::put("vehiculo", $coche_escogido->toArray());

                Session::save();

                return redirect('reservar-cliente');

                break;

            case 3:

                $userExist = User::where('email', Session::get("correo"))->first();

                if ($userExist != null && !Auth::user()) {
                    Session::put('message', 'el usuario ya existe');
                    Session::save();
                    return redirect('reservar-cliente');
                }

                Session::put("correo", $request->correo);

                Session::put("name", $request->name);

                Session::put("apellido", $request->apellido);
                Session::put("permiso_conducir", $request->permiso_conducir);
                Session::put("fecha_nacimiento", $request->fecha_nacimiento);
                Session::put("telefono", $request->telefono);
                Session::put("direccion", $request->direccion);
                Session::put("DNI", $request->DNI);
                Session::save();

                return redirect('reservar-resumen');

                break;

            case 4:

                //crear los registros necesarios

                //1) Usuario nuevo o logueado?

                if (Auth::user()) {
                    //si logueado...

                    $queUser = Auth::user()->id;
                } else {

                    //validar clave

                    $validator = Validator::make($request->all(), [
                        'password' => ['required', 'string', 'min:8', 'confirmed']
                    ]);

                    if ($validator->fails()) {
                        return redirect('reservar-resumen')
                            ->withErrors($validator)
                            ->withInput();
                    }


                    $queUser = User::insertGetId(
                        [
                            'name'                  => Session::get("name"),
                            'apellido'              => Session::get("apellido"),
                            'email'                 =>  Session::get("correo"),
                            'password'              =>  Hash::make($request->password),
                            'DNI'                   =>  Session::get("DNI"),
                            'permiso_conducir'      =>   Session::get("permiso_conducir"),
                            'fecha_nacimiento'      =>  Session::get("fecha_nacimiento"),
                            'telefono'              =>  Session::get("telefono"),
                            'direccion'              =>  Session::get("direccion"),

                            'created_at'            =>  Carbon::now(),

                        ]
                    );
                }

                $queReserva = Reserva::insertGetId(
                    [
                        'fecha_recogida' => date("Y-m-d", Session::get("fecha_recogida")),
                        'fecha_devolucion' => date("Y-m-d", Session::get("fecha_devolucion")),
                        'user_id'       => $queUser,
                        'n_dias'        =>  Session::get("num_dias"),
                        'total'         =>  Session::get("total"),
                        'created_at'    =>  Carbon::now()
                    ]
                );

                $vehiculo = Session::get('vehiculo');
                $coche = Vehiculo::where('id', $vehiculo['id'])->first();


                Vehiculo_Historico::insert([
                    'vehiculo_id'   =>  $coche->id,
                    'oficina_id'    =>  Session::get("oficina"),
                    'fecha_inicio'  =>  date("Y-m-d", Session::get("fecha_recogida")),
                    'fecha_fin'  =>     date("Y-m-d", Session::get("fecha_devolucion")),
                    'estado_vehiculo_id'    =>  2,
                    'reserva_id'    => $queReserva,
                    'created_at'    =>  Carbon::now()

                ]);


                return redirect('reservar-tramitada');

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

        return view('reserva.cliente', []); //carpeta reserva, fichero reserva, en los [] puedes pasar los datos que quieras a la vista
    }


    public function resumen(Request $request)
    {  //request porque coge sesiones

        $oficina = Oficina::where('id', Session::get('oficina'))->first();

        $vehiculo = Session::get('vehiculo');
        $coche = Vehiculo::where('id', $vehiculo['id'])->first();

        return view('reserva.resumen', [
            'oficina'   =>  $oficina,
            'coche'     =>  $coche
        ]);
    }

    public function tramitada(Request $request)
    {  //request porque coge sesiones


        return view('reserva.tramitada');
    }
}
