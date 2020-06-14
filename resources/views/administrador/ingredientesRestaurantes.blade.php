@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Inventario del Restaurante: {{$restaurante->nombre}}</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Restaurantes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inventario del Restaurante: {{$restaurante->nombre}}</li>
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
                    <table class="table table-striped table-bordered first text-center">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Ingrediente</th>
                                <th>Unidades</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restaurante->ingredientes as $ingrediente)
                            <tr>
                                <td>{{ $ingrediente->codigo }}</td>
                                <td>{{ $ingrediente->nombre }}</td>
                                <td>{{ $ingrediente->pivot->cantidad}}</td>
                                <td><a href="/administrador/restaurantes/ingredientes/eliminar/{{$restaurante->id}}/{{$ingrediente->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Codigo</th>
                                <th>Ingrediente</th>
                                <th>Unidades</th>
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