<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>La Gula del Sur</title>
    <link rel="stylesheet" href="{{asset('css/estilosHome.css')}}">
    <link rel="shortcut icon" href="{{url('/media/logo.png')}}" />
</head>

<body>


    <div class="container text-center registro">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12 my-5">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-0"></div>
                        <div class="col-lg-6 md-6"><a href="/restaurantes/{{$restaurante->id}}"><img src="{{url('/media/logo.png')}}"></a></div>
                    </div>
                    <h5 class="card-header text-center">Realizar Reserva</h5>
                    <div class="card-body">
                        <form action="#" id="crearReserva " method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row " id='reservaInputs' data-restaurante='{{$restaurante->id}}'>



                                <div class='col-3'>
                                    <label for="comensales"> Comensales :</label>
                                    <select id="comensales" name="comensales" class="form-control" name="comensales">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>

                                </div>
                                <div class='col-3'>
                                    <label for="puntuacion"> Fecha :</label>
                                    <input type="date" name="fecha" required class="form-control" id="fecha">
                                </div>

                                <div class='col-3'>
                                    <label for="hora"> Hora :</label>
                                    <select id="hora" name="hora" class="form-control">
                                        @for ($i = intval(substr($restaurante->hora_apertura, 0, 2))+1; $i <= intval(substr($restaurante->hora_cierre, 0, 2))-1; $i++) <option value="{{$i}}:00:00">{{$i}}:00</option>
                                            @endfor

                                    </select>
                                </div>



                                <div class="col-3">
                                    <label for="hora" class="invisible">.</label>
                                    <button type="submit" class="btn botonHome " id="aceptar">Buscar Mesa</button>

                                </div>
                                <hr>
                                <p id="respuesta"></p>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script>
        var hoy = new Date().toISOString().split('T')[0];
        document.getElementsByName("fecha")[0].setAttribute('min', hoy);
        document.getElementsByName("fecha")[0].defaultValue = hoy;



        $('#aceptar').on('click', function(e) {

            e.preventDefault();

            var restaurante = $('#reservaInputs').data('restaurante');



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('/reservas/añadir') }}",
                method: 'post',
                data: {

                    restaurante: restaurante,
                    fecha: $("#fecha").val(),
                    hora: $("#hora").val(),
                    comensales: $("#comensales").val(),



                },

                beforeSend: function() {

                    $('#respuesta').html('enviando solicitud...');
                },

                success: function(result) {

                    $('#respuesta').text(result.success);
                }
            });
        });
    </script>
</body>

</html>