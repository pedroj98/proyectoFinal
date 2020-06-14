<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/estilosTerminal.css')}}">
    <link rel="shortcut icon" href="{{url('/media/logo.png')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class=" contenedor container-fluid">

        <div class="container mb-2  cabecera py-3">

            <div class="row">

                <div class="col-lg-2 "><img src="{{url('/media/logo.png')}}"></div>
                <div class="col-lg-5 "></div>
                <div class="col-lg-5 ">
                    <div class="row mt-5 text-center nav">

                        <div class="col-3 fotoPerfil"><img src="{{ URL::to('/') }}/images/{{ Auth::user()->imagen }}"></div>
                        <div class="col-3  mt-3">{{ \Illuminate\Support\Str::limit(Auth::user()->usuario, 10, $end='') }}</div>
                        <div class="col-3  mt-3"><a href="/camarero/editar"><i class="fas fa-cog mr-2"></i> editar</a></div>
                        <div class="col-3  mt-3"><a href="/login/destroy/{{Auth::user()->id}}"><i class="fas fa-power-off mr-2"></i> Logout</a></div>



                    </div>
                </div>


                <p></p>
            </div>

        </div>
        <div class="container-fluid mt-3">


            <div class="row">

                <div class="col-lg-9 platos">

                    <div class="row mt-3 ">

                        @foreach(Auth::user()->restaurante->menu->platos->sortBy('id_categoria', SORT_REGULAR, false) as $plato)
                        <div class="plato  mb-3  col-lg-2 col-md-3 col-sm-6" data-id='{{$plato->id}}' data-nombre='{{$plato->nombre}}' data-precio='{{$plato->pivot->precio}}'>

                            <div class="borde p-2 ">

                                <div class="text-center {{$plato->categoria->nombre}}">

                                    <div class="imagen "> <img src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" alt="Card image"></div>
                                    <span>{{ \Illuminate\Support\Str::limit($plato->nombre, 15, $end='') }}</span>

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>
                <div class="col-lg-3 lateral mb-3">


                    <div class="bg-white my-3 pb-3 ticket">


                        <h1 class="mb-4 text-center">Vuelva pronto!</h1>
                        <hr>
                        <div id="platosFactura">

                        </div>
                        <div class="my-4">
                            <hr>
                            <p class="text-center ">Total = <span id="total"> 0 </span>€</p>
                            <p class="text-center"><span id="cobrar" data-restaurante='{{Auth::user()->restaurante->id}}'> Cobrar </span></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script>
        $(document).ready(function() {

            //ala hacer click en un plato lo añade al ticket, en caso de que ya
            //halla un plato de ese tipo incrementara la cantidad en 1
            $('.plato').click(function(e) {

                var plato = $(this);

                var factura = $('#platosFactura');

                var identificadorPlato = $("#plato" + plato.data('id'));

                if ($(identificadorPlato).length) {

                    var cantidad = $(identificadorPlato).find('.cantidad');
                    var subtotal = $(identificadorPlato).find('.subtotal');

                    cantidad.text(parseInt(cantidad.text()) + 1);
                    subtotal.text(parseInt(cantidad.text()) * plato.data('precio'));

                } else {
                    factura.append('  <p data-id="' + plato.data('id') + '" data-precio="' + plato.data('precio') + '" id="plato' + plato.data('id') + '"><span class="nombre">' + plato.data('nombre') + '</span> X <span class=" cantidad ">1</span> = <span class="subtotal">' + plato.data('precio') + '€</span> <span class="text-danger eliminar">&#10007;</span></p>');

                }

                actualizarTotal();

            });


            //elimina un plato del ticket
            $(document).on('click', ".eliminar", function() {

                $(this).closest('p').remove();

                actualizarTotal();

            });


            //al hacer click en cobrar se creara una factura con todos los platos del ticket
            //y se almacenaran tambien los platos que incluye dicha factura
            //una vez hecho esto se borrara el  ticket y se generara un ticket nuevo
            //listo para atender al proximo cliente
            $('#cobrar').on('click', function(e) {

                var total = parseFloat($('#total').text());
                var restaurante = $(this).data('restaurante');

                if (!total == 0) {



                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('/camarero/facturas/clientes/crear') }}",
                        method: 'post',
                        data: {
                            total: total,
                            restaurante: restaurante
                        }
                    });

                    $("#platosFactura p").each(function() {

                        var plato = $(this).data('id');
                        var precio = $(this).data('precio');
                        var cantidad = parseFloat($(this).find('.cantidad').text());



                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{ url('/camarero/facturas/clientes/platos/crear') }}",
                            method: 'post',
                            data: {
                                plato: plato,
                                precio: precio,
                                cantidad: cantidad

                            }
                        });
                    });

                    $('#platosFactura').empty();
                    actualizarTotal();

                }



            });




            //actualiza el total del ticket en funcion de las lineas de pedido que halla en el
            function actualizarTotal() {

                var total = 0;


                $(".subtotal").each(function() {

                    total += parseFloat($(this).text());
                });

                $('#total').text(total.toFixed(2));

            }


        });
    </script>

</body>

</html>