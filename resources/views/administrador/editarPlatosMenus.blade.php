@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Organizar Menu</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/menus" class="breadcrumb-link">Menus</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/menus/platos/{{$menu->id}}" class="breadcrumb-link">Platos del Menu: {{$menu->nombre}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Organizar Menu</li>
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
                            <th>Plato</th>
                            <th>Categoria</th>
                            <th>En el Menu</th>
                            <th>Imagen</th>
                            <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($platos as $plato)
                            <tr>
                                <td>{{ $plato->nombre }}</td>
                                <td>{{ $plato->categoria->nombre }}</td>
                                <td class="tipo">
                                    @if($menu->platos->contains('id', $plato->id))
                                    Platos en el Menu
                                    @else
                                    Platos fuera del Menu
                                    @endif
                                </td>
                                <td><img src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" width="100" height="100" /></td>
                                <td data-menu='{{$menu->id}}' data-plato='{{$plato->id}}' class="boton">
                                    @if($menu->platos->contains('id', $plato->id))
                                    <button type="button" class="btn btn-danger quitarPlato btn-xs">Quitar</button>
                                    @else
                                    <button type="button" class="btn btn-success añadirPlato btn-xs">Añadir</button>
                                    @endif
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Plato</th>
                                <th>Categoria</th>
                                <th>En el Menu</th>
                                <th>Imagen</th>
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
        //quita un plato de un menu elimenando su relacion en la tabla menu_platos
        $('.quitarPlato').click(function(e) {

            var plato = $(this).closest('td').data("plato");
            var menu = $(this).closest('td').data("menu");


            $(this).closest('.boton').html(' <button type="button" class="btn btn-info btn-xs">hecho</button>');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/administrador/menus/platos/eliminar') }}",
                method: 'post',
                data: {
                    plato: plato,
                    menu: menu
                }
            });

        });

        //añade un plato de un menu creando un registro  en la tabla menu_platos
        $('.añadirPlato').click(function(e) {

            var plato = $(this).closest('td').data("plato");
            var menu = $(this).closest('td').data("menu");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/administrador/menus/platos/añadir') }}",
                method: 'post',
                data: {
                    plato: plato,
                    menu: menu
                }
            });


            $(this).closest('.boton').html(' <button type="button" class="btn btn-info btn-xs">hecho</button>');
        });


    });
</script>

@endsection