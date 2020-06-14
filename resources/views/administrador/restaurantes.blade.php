@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Restaurantes</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Restaurantes</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header"><a href="/administrador/restaurantes/crear" class="btn btn-outline-success">Añadir Nuevo</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first text-center">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Fecha de Apertura</th>
                                <th>Hora Apertura</th>
                                <th>Hora Cierre</th>
                                <th>Inventario</th>
                                <th>Menu</th>
                                <th>Gerente</th>
                                <th>Mesas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restaurantes as $restaurante)
                            <tr>
                                <td>{{ $restaurante->nombre }}</td>
                                <td>{{ $restaurante->ciudad }}</td>
                                <td>{{ $restaurante->direccion }}</td>
                                <td>{{ $restaurante->telefono }}</td>
                                <td>{{ $restaurante->fecha_apertura }}</td>
                                <td>{{ $restaurante->hora_apertura }}</td>
                                <td>{{ $restaurante->hora_cierre }}</td>
                                <td>{{ $restaurante->ingredientes->count()}}
                                    @if($restaurante->ingredientes->count()>0)
                                    <a href="/administrador/restaurantes/ingredientes/{{$restaurante->id}}"><i class="fas fa-eye m-2 text-success"></i></a>
                                    @endif
                                </td>
                                <td>{{ $restaurante->menu->nombre ?? '-' }}</td>
                                <td>{{ $restaurante->gerente->first()->nombre ?? '-'}}</td>
                                <td>{{ $restaurante->mesas->count()}}
                                    <a href="/administrador/restaurantes/mesas/{{$restaurante->id}}"><i class="fas fa-eye m-2 text-success"></i></a>
                                </td>
                                <td><a href="/administrador/restaurantes/eliminar/{{$restaurante->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                    <a href="/administrador/restaurantes/editar/{{$restaurante->id}}"><i class="fas fa-edit text-warning m-2"></i></a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Fecha de Apertura</th>
                                <th>Hora de Apertura</th>
                                <th>Hora de Cierre</th>
                                <th>Inventario</th>
                                <th>Menu</th>
                                <th>Gerente</th>
                                <th>Mesas</th>
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