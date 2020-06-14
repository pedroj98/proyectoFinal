@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Proveedores</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header"><a href="/administrador/proveedores/crear" class="btn btn-outline-success">Añadir Nuevo</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first text-center">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Pais</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Ingredientes</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->pais }}</td>
                                <td>{{ $proveedor->direccion }}</td>
                                <td>{{ $proveedor->email }}</td>
                                <td>{{ $proveedor->telefono }}</td>       
                                <td>{{ $proveedor->ingredientes()->count() }}
                                    @if($proveedor->ingredientes->count()>0)
                                    <a href="/administrador/proveedores/ingredientes/{{$proveedor->id}}"><i class="fas fa-eye m-2 text-success"></i></a>
                                    @endif
                                </td>                    
                                <td><a href="/administrador/proveedores/eliminar/{{$proveedor->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                    <a href="/administrador/proveedores/editar/{{$proveedor->id}}"><i class="fas fa-edit text-warning m-2"></i></a>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Pais</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Ingredientes</th>
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