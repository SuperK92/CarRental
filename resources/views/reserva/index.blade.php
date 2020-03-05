@extends('../layouts.app')

@section('content')

    <section>
        <div class="container">

            <div class="separa-50"></div>

            <h2>Escoge tu vehículo</h2>

            <p>Selecciona el grupo de vehículos que más se adapte a tus necesidades</p>

            <div class="separa-20"></div>

            <div class="row">
                @foreach ($coches as $coche)
                <div class="col-6">
                    <div class="coche-reserva">
                        <div class="imagen" style="background-image:url( {{ asset('uploads/'.$coche->imagen) }} )"></div>
                        <div class="coche-texto row">
                            <div class="col-8">
                                <h3>{{ $coche->modelo->marca->nombre }} {{ $coche->modelo->nombre }}</h3>
                                <h4>Grupo {{ $coche->categoria->nombre }}</h4>
                            </div>
                            <div class="col-4">
                                <p>
                                    Total: <strong><?php echo $coche->categoria->precio_dia * $numDias;?></strong>€
                                </p>
                            </div>

                            <form action="/reservar/paso2" method="post">
                                @csrf
                                <input type="hidden" name="coche" value="{{$coche->id}}">
                                <input type="submit" value="Reserar">
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
               
                
            </div>
        </div>
    </section>
    
@endsection