<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{csrf_token()}}" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/estilosPedidos.css')}}">
    <link rel="shortcut icon" href="{{url('/media/logo.png')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="contenedor my-3">

        <div class="container  mt-3 tabla" data-menu='{{$restaurante->menu->id}}' data-restaurante='{{$restaurante->id}}'>

            <div class="row">
                <div class="col-12 marron text-center py-2">

                    <h1> REALIZAR PEDIDO</h1>

                </div>

                <div class="bg-white col-4 ladoTabla">
                    <div class="container bg-white my-3 text-center">
                        <h2 class="">Carta de Platos <i class="fas fa-book-open"></i></h2>
                        <hr>
                        <input type="text" id='buscador' name="buscar" placeholder="buscar por nombre" class="my-2 form-control">
                        <select name="categoria" id="categoria" class="form-control my-4">
                            <option value="0">Todas las Categorias</option>
                            <option value="1">Desayunos</option>
                            <option value="2">Entrantes</option>
                            <option value="3">Platos Principales</option>
                            <option value="4">Sopas</option>
                            <option value="5">Postres</option>
                        </select>

                    </div>
                    <div class="bg-white seccion" id='carta'>


                        @foreach($restaurante->menu->platos as $plato)

                        <div class='container bg-white plato seleccionable' data-id='{{$plato->id}}' data-categoria='{{$plato->categoria->nombre}}' data-nombre='{{$plato->nombre}}' data-precio='{{$plato->pivot->precio}}' data-imagen='{{ URL::to("/") }}/images/{{ $plato->imagen }}'>
                            <div class='row'>
                                <div class='col-6 my-3'>
                                    <img src='{{ URL::to("/") }}/images/{{ $plato->imagen }}'>
                                </div>
                                <div class='col-6 my-3'>
                                    <p><strong>Nombre:</strong> {{$plato->nombre}}</p>
                                    <p><strong>Categoria:</strong> {{$plato->categoria->nombre}}</p>
                                    <p><strong>Precio: </strong>{{$plato->pivot->precio}}€</p>
                                </div>
                            </div>

                        </div>
                        <hr>

                        @endforeach

                    </div>
                </div>
                <div class="col-4 marron imagen"><img src="{{url('/media/logo.png')}}"></div>
                <div class="col-4 bg-white ladoTabla">
                    <div class="container bg-white my-3 text-center">
                        <h2 class="">Platos en Carrito</h2>
                    </div>
                    <hr>
                    <div class="bg-white seccion " id="carrito">

                    </div>
                    <hr>
                    <div class="row mt-5 text-center">

                        <div class="col-3 bg-white py-3 total text-center"><button type="button" class="btn btn-outline-danger vaciar">Vaciar</button></div>
                        <div class="col-5 bg-white py-3 total">
                            <div class="row text-center">
                                <div class="col-12 mb-2"><strong>Total:</strong></div>
                                <div class="col-12"><span id='total'>00.00</span>€</div>
                            </div>
                        </div>
                        <div class="col-3 bg-white py-3 total text-center"><a id="pagar" type="button" href="/restaurantes/{{$restaurante->id}}" class="btn btn-outline-danger">Pagar</a></div>

                    </div>
                </div>



            </div>

        </div>


        <script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>

        <script>
            $(document).ready(function() {


                //al hacer click en el boton de pagar
                $(document).on('click', "#pagar", function(e) {



                    var restaurante = $('.tabla:first').data('restaurante');

                    var total = parseFloat($('#total').text());

                    //comprueba si el total esta en 0 antes de hacer nada
                    if (total == 0) {

                        e.preventDefault();

                        //si hay platos en el carrito se generara una nueva factura
                    } else {


                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{ url('/facturas/clientes/crear') }}",
                            method: 'post',
                            data: {
                                total: total,
                                restaurante: restaurante
                            }
                        });

                        //se añadiran todos los platos del carrito a la relacion platos-factura
                        $("#carrito .plato").each(function() {

                            var plato = $(this).data('id');
                            var precio = $(this).data('precio');
                            var cantidad = parseFloat($(this).find('.cantidad').text());

                            var identificadorPlato = $("#plato" + $(this).data('id'));

                            var id = $(this).data('id');
                            var cantidad = $(identificadorPlato).find('.cantidad').text();
                            var precio = $(identificadorPlato).find('.precio').text();




                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                }
                            });

                            $.ajax({
                                url: "{{ url('/facturas/clientes/platos/crear') }}",
                                method: 'post',
                                data: {
                                    plato: plato,
                                    precio: precio,
                                    cantidad: cantidad

                                }
                            });
                        });


                        //se generara un nuevo pedido con la factura recien creada
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "{{ url('/pedidos/añadir') }}",
                            method: 'post',
                            data: {
                                restaurante: restaurante,

                            }
                        });


                    }


                });




                //al hacer click en un plato se añadira al carrito
                //en caso de que el plato ya se encuentre en el carrito se incrementara la cantidad
                $(document).on('click', ".seleccionable", function() {

                    var plato = $(this);

                    var imagen = $(this).data('imagen');

                    var carrito = $('#carrito');
                    var identificadorPlato = $("#plato" + plato.data('id'));

                    if ($(identificadorPlato).length) {

                        var cantidad = $(identificadorPlato).find('.cantidad');
                        var subtotal = $(identificadorPlato).find('.subtotal');

                        cantidad.text(parseInt(cantidad.text()) + 1);
                        subtotal.text(parseInt(cantidad.text()) * plato.data('precio'));


                    } else {
                        carrito.append(' <div id="plato' + plato.data('id') + '" class="container plato  bg-white" data-id="' + plato.data("id") + '"> <div class="row">  <div class=" col-10"></div><div class="text-center col-2"> <i class="fas fa-times text-center borrarPlato"></i></div> <div class="col-6 my-3"><img src="' + imagen + '"></div><div class="col-6 my-3"><p><strong>Nombre:</strong> ' + plato.data("nombre") + '</p><p><strong>Precio:</strong> <span class="precio">' + plato.data("precio") + '</span>€</p> <p><strong>Cantidad:</strong> <span class="cantidad">1</span></p><p><strong>Subtotal:</strong> <span class="subtotal">' + plato.data("precio") + '</span> €</p></div> </div></div><hr>');

                    }


                    actualizarTotal();

                });
                
                //en caso de que se indique un nombre en el input se llamara a l clase filtrar
                $('#categoria').on('change', function() {

                    filtrar();
                });


                //si cambia el valor del select categoria se llama a la funcion filtrar
                $(document).on('change', "#buscador", function() {

                    filtrar();


                });


                //filtra los platos que se mostraran en funcion de los criterios elegidos
                function filtrar() {

                    $('#carta').empty();

                    var nombre = $('#buscador').val();
                    var menu = $('.tabla:first').data('menu');
                    var categoria = $('select[name=categoria] option').filter(':selected').val()

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('/menus/platos/filtro') }}",
                        method: 'get',
                        data: {
                            menu: menu,
                            categoria: categoria,
                            nombre: nombre

                        },
                        success: function(result) {



                            $('#carta').append(result.success);

                        }
                    });
                }


                //elimina el plato seleccionado
                $(document).on('click', ".borrarPlato", function() {

                    //para eliminar el <hr>
                    $(this).closest('.plato').next().remove();
                    $(this).closest('.plato').remove();

                    actualizarTotal();

                });

                //vacia el carrito de la compra
                $(document).on('click', ".vaciar", function() {


                    $('#carrito').empty();
                    actualizarTotal();

                });

                //actualiza el total en funcion de los platos del carrito
                function actualizarTotal() {

                    var total = 0;


                    $(".subtotal").each(function() {

                        total += parseFloat($(this).text());
                    });

                    $('#total').text(total.toFixed(2));

                }




            });
        </script>
        </script>


</body>

</html>