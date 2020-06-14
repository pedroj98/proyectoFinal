<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Gula del Sur</title>
    <link rel="stylesheet" href="{{asset('css/estilosHome.css')}}">
    <link rel="shortcut icon" href="{{url('/media/logo.png')}}" />

</head>

<body>

    <div class="container contenedor mt-3">

        <div class="cabecera pb-5">
            <div class="row">

                <div class="col-lg-3">

                    <div class="col-12 redes mt-4">
                        <div class="row">

                            <div class="col-3 mt-5"><a href="https://es-es.facebook.com/"><i class="fab fa-facebook-f"></i></a></div>
                            <div class="col-3 mt-5"><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></div>
                            <div class="col-3 mt-5"><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></div>
                            <div class="col-3 mt-5"><a href="https://www.google.com/"><i class="fab fa-google-plus-g"></i></a></div>


                        </div>

                    </div>

                </div>
                <div class="col-lg-3 md-12"><a href='/'><img src="{{url('/media/logo.png')}}"></a></div>
                <div class="col-lg-6 enlaces mt-4">
                    <div class="row">
                        <div class="col-3 mt-5"><a href="/restaurantes"> Restaurantes</a></div>
                        <div class="col-3 mt-5"><a href="#"> Novedades</a></div>
                        <div class="col-3 mt-5"><a href="#"> Contactar</a></div>
                        @if(Auth::guest())
                        <div class="col-3 mt-5"><a href="/login"> Iniciar Sesion</a></div>

                        @else
                        <div class="col-3 mt-5 perfil">
                            <div class="row">
                                <div class="col-6 "> <a href="/clientes/editar"><img src="{{ URL::to('/') }}/images/{{ Auth::user()->imagen }}"></a></div>
                                <div class="col-3"> <a href="/login/destroy/{auth()->user()-id>}"><i class="fas fa-sign-out-alt"></i></a></div>



                            </div>
                        </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="cuerpo my-4">

            @yield('cuerpo')
        </div>
        <div class="pie my-5  py-5 ">

            <div class="text-center">Proyecto Daw 2019/2020 -- Pedro Jose Castro Rodriguez -- La Gula del Sur</div>

        </div>



    </div>
    <script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>

    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

   
</body>

</html>