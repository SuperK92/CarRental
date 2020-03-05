@extends('../layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="separa-50"></div>
            <form action="/reservar/paso3" method="post">
                @csrf

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="name" value="<?php if(Auth::user()) echo Auth::user()->name ?>">
                </div>

                <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="<?php if(Auth::user()) echo Auth::user()->apellido ?>">
                </div>

                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="correo" value="<?php if(Auth::user()) echo Auth::user()->email ?>">
                </div>

                <input type="submit" value="Confirmar">
            </form>
          
        </div>
    </section>
    
@endsection