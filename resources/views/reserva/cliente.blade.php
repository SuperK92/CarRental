@extends('../layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="separa-50"></div>
            <form action="/reservar/paso3" method="post">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="<?php if(Auth::user()) echo Auth::user()->name ?>" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                    <div class="col-md-6">
                        <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="<?php if(Auth::user()) echo Auth::user()->apellido ?>" required autocomplete="apellido" autofocus>
                       

                        @error('apellido')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="DNI" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                    <div class="col-md-6">
                        <input id="DNI" type="text" class="form-control @error('DNI') is-invalid @enderror" name="DNI" value="<?php if(Auth::user()) echo Auth::user()->DNI ?>" required autocomplete="DNI" autofocus>

                        @error('DNI')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="permiso_conducir" class="col-md-4 col-form-label text-md-right">{{ __('admin.permiso_conducir') }}</label>

                    <div class="col-md-6">
                        <input id="permiso_conducir" type="text" class="form-control @error('permiso_conducir') is-invalid @enderror" name="permiso_conducir" value="<?php if(Auth::user()) echo Auth::user()->permiso_conducir ?>" required autocomplete="permiso_conducir" autofocus>

                        @error('permiso_conducir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                @guest

                <div class="form-group row">
                    <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Email address') }}</label>

                    <div class="col-md-6">
                        <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="<?php if(Auth::user()) echo Auth::user()->correo ?>" required autocomplete="correo" autofocus>

                        <?php if(Session::get('message')){?>

                            <div class="alert alert-danger" role="alert">
                                <?php echo Session::pull('message') ?>
                            </div>
                        <?php }?>

                        @error('correo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                @endguest

                <div class="form-group row">
                    <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('admin.fecha_nacimiento') }}</label>

                    <div class="col-md-6">
                        <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="<?php if(Auth::user()) echo Auth::user()->fecha_nacimiento ?>" required autocomplete="fecha_nacimiento" autofocus>

                        @error('fecha_nacimiento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

               
                <div class="form-group row">
                    <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('admin.telefono') }}</label>

                    <div class="col-md-6">
                        <input id="telefono" type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="<?php if(Auth::user()) echo Auth::user()->telefono ?>" required autocomplete="telefono" autofocus>

                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('admin.direccion') }}</label>

                    <div class="col-md-6">
                        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="<?php if(Auth::user()) echo Auth::user()->direccion ?>" required autocomplete="direccion" autofocus>

                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4 text-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Siguiente Paso') }}
                        </button>
                    </div>
                </div>

            </form>
          
        </div>
    </section>
    
@endsection