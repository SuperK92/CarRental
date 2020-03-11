@extends('../layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="separa-50"></div>

            <h2>Datos de la reserva</h2>
            <div class="separa-20"></div>

            <p><strong>Fecha Recogida:</strong> <?php echo date("d/m/Y", Session::get('fecha_recogida') );  ?></p>
            <p><strong>Fecha Devolución:</strong> <?php echo date("d/m/Y", Session::get('fecha_devolucion') ); ?></p>
            <p><strong>Oficina:</strong> <?php echo $oficina->nombre?></p>
            <p><strong>Coche:</strong> Grupo {{ $coche->categoria->nombre }} - {{ $coche->modelo->marca->nombre }} {{ $coche->modelo->nombre }}</p>

            <hr>

            <h2>Datos del cliente</h2>
            <div class="separa-20"></div>

            <p><strong>Nombre:</strong> <?php echo Session::get('name')  ?> <?php echo Session::get('apellido')  ?></p>
            <p><strong>DNI:</strong> <?php echo Session::get('DNI')  ?></p>
            <p><strong>Fecha Nacimiento:</strong> <?php echo date("d/m/Y", strtotime( Session::get('fecha_nacimiento') ) ); ?></p>
            <p><strong>Email:</strong> <?php echo Session::get('correo')  ?></p>
            <p><strong>Telefono:</strong> <?php echo Session::get('telefono')  ?></p>
            <p><strong>Direccion:</strong> <?php echo Session::get('direccion')  ?></p>

            <form action="/reservar/paso4" method="post">
                @csrf

                @guest

                <hr>
                <h2>Crea tu cuenta y confirma tu reserva</h2>
                <div class="separa-20"></div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

             
                @else

                <hr>
                <h2>Confirma tu reserva</h2>
                <div class="separa-20"></div>

                @endguest

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Confirmar') }}
                        </button>
                    </div>
                </div>

            </form>
          
        </div>
    </section>
    
@endsection