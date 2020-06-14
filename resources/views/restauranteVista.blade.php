@extends('../layouts/home')

@section('cuerpo')

<div class="restaurantes container-fluid">

    <div class="col-12 text-center my-3">


        <div class="row">
            <div class="col-12 my-3">
                <h1>{{$restaurante->nombre}}</h1>
            </div>
            <div class="col-12 my-3">
                <div class="row">
                    @if(!Auth::guest())
                    <div class="col-6 "><a href='/reservas/crear/{{$restaurante->id}}' class="btn btn-lg m-2 mb-3 restauranteBoton">Hacer una Reserva</a></div>
                    <div class="col-6 "><a href="/pedidos/crear/{{$restaurante->id}}" class="btn btn-lg m-2 mb-3 restauranteBoton">Realizar un Pedido</a></div>
                    @endif
                </div>
            </div>
            <div class="col-12 fotoRestaurante"></div>

            <div class="col-12 mt-5">
                <h1>Menu</h1>

            </div>
            <div class="menu">
                <div class="container-fluid">
                    <h2 class="my-5">desayunos</h2>
                    <div id="desayunos" class="carousel slide mover" data-ride="carousel">
                        <div class="carousel-inner row w-100 mx-auto slider">
                            @foreach($restaurante->menu->desayunos as $plato)
                            <div class="carousel-item col-md-4 ">
                                <div class="card menuPlato">
                                    <img class="card-img-top img-fluid fotoPlato" src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$plato->nombre}}</h4>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($plato->descripcion, 150, $end='...') }}</p>
                                        <p class="card-text fixed-bottom mb-3"><small>{{$plato->pivot->precio}} €</small></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#desayunos" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#desayunos" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="container-fluid">
                    <h2 class="my-5">entrantes</h2>
                    <div id="entrantes" class="carousel slide mover" data-ride="carousel">
                        <div class="carousel-inner row w-100 mx-auto slider">
                            @foreach($restaurante->menu->entrantes as $plato)
                            <div class="carousel-item col-md-4 ">
                                <div class="card menuPlato">
                                    <img class="card-img-top img-fluid fotoPlato" src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$plato->nombre}}</h4>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($plato->descripcion, 150, $end='...') }}</p>
                                        <p class="card-text fixed-bottom mb-3"><small>{{$plato->pivot->precio}} €</small></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#entrantes" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#entrantes" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="container-fluid">
                    <h2 class="my-5">platos principales</h2>
                    <div id="platosPrincipales" class="carousel slide mover" data-ride="carousel">
                        <div class="carousel-inner row w-100 mx-auto slider">
                            @foreach($restaurante->menu->platosPrincipales as $plato)
                            <div class="carousel-item col-md-4 ">
                                <div class="card menuPlato">
                                    <img class="card-img-top img-fluid fotoPlato" src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$plato->nombre}}</h4>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($plato->descripcion, 150, $end='...') }}</p>
                                        <p class="card-text fixed-bottom mb-3"><small>{{$plato->pivot->precio}} €</small></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#platosPrincipales" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#platosPrincipales" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="container-fluid col-sm-12">
                    <h2 class="my-5">sopas</h2>
                    <div id="sopas" class="carousel slide mover" data-ride="carousel">
                        <div class="carousel-inner row w-100 mx-auto slider">
                            @foreach($restaurante->menu->sopas as $plato)
                            <div class="carousel-item col-md-4 ">
                                <div class="card menuPlato">
                                    <img class="card-img-top img-fluid fotoPlato" src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$plato->nombre}}</h4>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($plato->descripcion, 150, $end='...') }}</p>
                                        <p class="card-text fixed-bottom mb-3"><small>{{$plato->pivot->precio}} €</small></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#sopas" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#sopas" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="container-fluid">
                    <h2 class="my-5">postres</h2>
                    <div id="postres" class="carousel slide mover" data-ride="carousel">
                        <div class="carousel-inner row w-100 mx-auto slider">
                            @foreach($restaurante->menu->postres as $plato)
                            <div class="carousel-item col-md-4 ">
                                <div class="card menuPlato">
                                    <img class="card-img-top img-fluid fotoPlato" src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">{{$plato->nombre}}</h4>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($plato->descripcion, 150, $end='...') }}</p>
                                        <p class="card-text fixed-bottom mb-3"><small>{{$plato->pivot->precio}} €</small></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#postres" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#postres" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5">
                <h1>Criticas</h1>
            </div>
            <div class="container">

                @foreach($criticas as $critica)
                <div class="row  my-5 ">
                    <div class="col-lg-1 "></div>
                    <div class=" col-lg-10 text-left critica ">
                        <div class="row">
                            <div class=" col-lg-3 my-2">
                                <h5>Por: {{$critica->usuario->usuario}}</h5>
                            </div>
                            <div class=" col-lg-3  my-2">
                                <h5>Fecha: {{$critica->fecha}}</h5>
                            </div>
                            <div class=" col-lg-2 "></div>
                            <div class=" col-lg-4  my-2">
                                <h5>Puntuacion: @switch($critica->puntuacion)
                                    @case(1)
                                    <i class="fas fa-star "></i>
                                    @break
                                    @case(2)
                                    <i class="fas fa-star "></i><i class="fas fa-star "></i>
                                    @break
                                    @case(3)
                                    <i class="fas fa-star "></i><i class="fas fa-star "></i><i class="fas fa-star "></i>
                                    @break
                                    @case(4)
                                    <i class="fas fa-star "></i><i class="fas fa-star "></i><i class="fas fa-star "></i><i class="fas fa-star "></i>
                                    @break
                                    @case(5)
                                    <i class="fas fa-star "></i><i class="fas fa-star "></i><i class="fas fa-star "></i><i class="fas fa-star "></i><i class="fas fa-star "></i>
                                    @break
                                    @endswitch
                                </h5>
                            </div>
                            <div class=" col-lg-12 ">
                                <div class="row">
                                    <div class=" col-lg-12 my-3">
                                        <h4>{{$critica->titulo}}</h4>
                                    </div>
                                    <div class=" col-lg-12  my-2">{{$critica->descripcion}}</div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                @endforeach
            </div>
            <div class="container-fluid  submenu mt-3">
                <div class="row">

                    <div class="col-lg-4 info1">

                        <div class="container mt-4">
                            <div class="container text-center">

                                <h3>{{$restaurante->nombre}}</h3>
                                <p>Abrimos todos los dias</p>
                                <p>De {{$restaurante->hora_apertura}} a {{$restaurante->hora_cierre}}</p>
                                <p>{{$restaurante->direccion}}/{{$restaurante->ciudad}}</p>
                                <p><a href="http://maps.google.com/maps?q={{$restaurante->direccion}}/{{$restaurante->ciudad}}"><i class="fas fa-map-marker-alt h1"></i></a></p>



                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4  info2">
                        <div class="container  mt-4">

                            <h4>Deja tu Critica</h4>
                            <p class="text-center">Tanto si su visita a {{$restaurante->nombre}} ha sido un placer para los sentidos
                            como si no nos complaceria que escribiese una critica sobre su experiencia en nuestro restaurante concreto
                            el fin de que futuros clientes esten al corriente del servicio que ofrecemos
                            </p>
                            @if ( !Auth::guest())
                            <a href="/criticas/crear/{{$restaurante->id}}">Escribir una Critica</a>
                            @else
                            <a href="/registro">Registrate para compartir tu critica</a>
                            @endif



                        </div>
                    </div>
                    <div class="col-lg-4 info3">
                        <div class="container  mt-4">
                            <div class="container  mt-4">

                                <h4>Comunica una Queja</h4>
                                <p class="text-center">Si su visita a {{$restaurante->nombre}} a sido una autentica decepcion
                                y cree que los responsables del restaurante deben estar al tanto de un factor negativo importante
                                sobre el restaurante le rogamos que nos notifique su queja pinchando en el enlace de mas abajo
                                </p>
                                @if ( !Auth::guest())
                                <a href="/quejas/crear/{{$restaurante->id}}">Escribir una Queja</a>
                                @else
                                <a href="/registro">Registrate ahora para notificarnos tu queja</a>
                                @endif


                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        $(".slider div:first-child").addClass('active');
    </script>

</div>



@endsection