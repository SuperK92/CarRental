@extends('layouts.app')

@section('content')

    <section>
        <div class="banner" style="background-image:url( {{asset('img/slider-rental.jpg')}} )">
            <div class="slide">
                <div class="container">
                    <h3>Rent a car</h3>
                    <h2>By Kelly Suarez</h2>
                </div>
            </div>
            <div class="wrap-figure"></div>
        </div>
    </section>

    <section class="buscador">
        <div class="container">
        <h2>Encuentra tu vehículo</h2>

        <form action="/reservar/paso1" method="post">
            @csrf
            <input type="hidden" name="paso" value="1">
        <div class="row">
            <div class="col-10">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lugar de Recogida</label>
                            <select name="oficina" class="form-control" required>
                                <option value="1" selected>Aeropuerto Gran Canaria</option>
                                <option value="2">Las Palmas Gran Canaria - Teatro</option>
                                <option value="3">Maspalomas</option>
                            </select>
                          </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fecha de recogida</label>
                            <input type="text" class="form-control fecha_recogida" name="fecha_recogida" required>
                          </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Fecha de devolución</label>
                            <input type="text" class="form-control fecha_devolucion" name="fecha_devolucion" required >
                          </div>
                    </div>

                </div>
               
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block">Reservar</button>
            </div>
            </div>
        </div>
    </form>
    </section>

    <section class="bienvenida">
        <div class="container">
            <h2>Find Your Favourite Cars</h2>
            <div class="spacer centrado"></div>
            <p>
                Roadster is nisi aliquip consequat duis velit esse cillum dolore fugiat nulla pariatur excepteur sint aecat orem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididuntu labore dolore magna aliqua orem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua enim ad veniam quis sed ipsum nostrud exercitation ullamco laboris nisi ut aliquip consequat.
            </p>
        </div>
    </section>

    <section class="features" style="background-image:url( {{asset('img/bg-1.jpg')}} )">
        <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="block-video_media">
                        <a href="#"><img src="{{ asset('img/video.jpg') }}"></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="padding">
                    <h2>¿Cómo funciona?</h2>
                    <div class="spacer"></div>
                    <div class="block-video_content">
                        <h5>Roadster is daliquip consequat duis velit esse cillum sed dolore fugiat nulla
                        excepteur sint occaecat lorem ipsum dolor sit amet.
                        </h5>
                        <p>Roadster is nisi aliquip consequat duis velit esse cillum dolore fugiat nulla exce pteur sint occaecat lorem ipsum dolor sit amet consectetur adipisicing elit sed giusmod tempor incididuntu labore et dolore ipsmagna excepteur sint occaecat cupidatat non proident sunt in culpa officia.</p>
                        <ul>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i>No hidden or extra charges for insurance</li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i>Affordable car rental services with large fleet</li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i>Book now Ride later facility with secure payment</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>

@endsection