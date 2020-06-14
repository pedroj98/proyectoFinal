@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Empleados</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Empleados</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header"><a href="/administrador/empleados/crear" class="btn btn-outline-success">Añadir Nuevo</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first text-center">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Fecha de Incorporacion</th>
                                <th>Num de Seguridad Social</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Sueldo</th>
                                <th>Role</th>
                                <th>Restaurante</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->apellidos }}</td>
                                <td>{{ $empleado->fecha_nacimiento }}</td>
                                <td>{{ $empleado->fecha_incorporacion }}</td>
                                <td>{{ $empleado->numero_seguridad_social }}</td>
                                <td>{{ $empleado->direccion }}</td>
                                <td>{{ $empleado->email }}</td>
                                <td>{{ $empleado->telefono }}</td>
                                <td>{{ $empleado->sueldo }}</td>
                                <td>{{ $empleado->role->nombre }}</td>
                                <td>{{ $empleado->restaurante->nombre ?? '-' }}</td>
                                <td><img src="{{ URL::to('/') }}/images/{{ $empleado->imagen }}" width="50" height="50"/></td>
                                <td><a href="/administrador/empleados/eliminar/{{$empleado->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                    <a href="/administrador/empleados/editar/{{$empleado->id}}"><i class="fas fa-edit text-warning m-2"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Fecha de Incorporacion</th>
                                <th>Num de Seguridad Social</th>
                                <th>Direccion</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Sueldo</th>
                                <th>Role</th>
                                <th>Restaurante</th>
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