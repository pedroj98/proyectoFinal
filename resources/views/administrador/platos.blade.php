@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Platos</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Platos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header"><a href="/administrador/platos/crear" class="btn btn-outline-success">Añadir Nuevo</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first text-center">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Ingredientes</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($platos as $plato)
                            <tr>
                                <td>{{ $plato->nombre }}</td>
                                <td>{{ $plato->categoria->nombre }}</td>
                                <td>{{ $plato->ingredientes->count() }}
                                    <a href="/administrador/platos/ingredientes/{{$plato->id}}"><i class="fas fa-eye m-2 text-success"></i></a>
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($plato->descripcion, 150, $end='...') }}</td>
                                <td><img src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" width="100" height="100" /></td>
                                <td><a href="/administrador/platos/eliminar/{{$plato->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                    <a href="/administrador/platos/editar/{{$plato->id}}"><i class="fas fa-edit text-warning m-2"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Ingredientes</th>
                                <th>Descripcion</th>
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



@endsection