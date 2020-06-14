@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Asignar Ingredientes</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/platos" class="breadcrumb-link">Platos</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/platos/ingredientes/{{$plato->id}}" class="breadcrumb-link">Ingredientes de: {{$plato->nombre}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Asignar Ingredientes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered text-center" style="width:100%">
                        <thead>
                            <th>Codigo</th>
                            <th>Ingrediente</th>
                            <th>Compone</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ingredientes as $ingrediente)
                            <tr>
                                <td>{{ $ingrediente->codigo }}</td>
                                <td>{{ $ingrediente->nombre }}</td>
                                <td class="tipo">
                                    @if($plato->ingredientes->contains('id', $ingrediente->id))
                                    Ingredientes del Plato
                                    @else
                                    Ingredientes fuera del Plato
                                    @endif
                                </td>
                                <td data-ingrediente='{{$ingrediente->id}}' data-plato='{{$plato->id}}' class="boton">
                                    @if($plato->ingredientes->contains('id', $ingrediente->id))
                                    <button type="button" class="btn btn-danger quitarIngrediente btn-xs">Quitar</button>
                                    @else
                                    <button type="button" class="btn btn-success añadirIngrediente btn-xs">Añadir</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Ingrediente</th>
                                <th>Compone</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<script>
    $(document).ready(function() {
        //elimina un ingrediente de un plato eliminando su relacion en la tabla ingredientes-platos
        $('.quitarIngrediente').click(function(e) {

            var plato = $(this).closest('td').data("plato");
            var ingrediente = $(this).closest('td').data("ingrediente");


            $(this).closest('.boton').html(' <button type="button" class="btn btn-info btn-xs">hecho</button>');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/administrador/platos/ingredientes/eliminar') }}",
                method: 'post',
                data: {
                    plato: plato,
                    ingrediente: ingrediente
                }
            });

        });
        //añade un ingrediente de un creando una relacion en la tabla ingredientes-platos
        $('.añadirIngrediente').click(function(e) {

            var plato = $(this).closest('td').data("plato");
            var ingrediente = $(this).closest('td').data("ingrediente");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/administrador/platos/ingredientes/añadir') }}",
                method: 'post',
                data: {
                    plato: plato,
                    ingrediente: ingrediente
                }
            });


            $(this).closest('.boton').html(' <button type="button" class="btn btn-info btn-xs">hecho</button>');
        });


    });
</script>

@endsection