@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Quejas</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Quejas</li>
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
                                <th>Usuario</th>
                                <th>Restaurante</th>
                                <th>Fecha</th>
                                <th>Titulo</th>
                                <i class="fas fa-angry"></i>
                                <th>Gravedad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quejas as $queja)
                            <tr>
                                <td> {{$queja->usuario->usuario }}</td>
                                <td> {{$queja->restaurante->nombre }}</td>
                                <td> {{$queja->fecha }}</td>
                                <td> {{$queja->titulo }}</td>
                                <td>
                                    @switch($queja->puntuacion)
                                    @case(1)
                                   <i class="fas fa-exclamation-circle text-danger m-1"></i>
                                    @break

                                    @case(2)
                                   <i class="fas fa-exclamation-circle text-danger m-1"></i><i class="fas fa-exclamation-circle text-danger m-1">
                                    @break

                                    @case(3)
                                   <i class="fas fa-exclamation-circle text-danger m-1"></i><i class="fas fa-exclamation-circle text-danger m-1"><i class="fas fa-exclamation-circle text-danger m-1">
                                    @break
                                    @case(4)
                                   <i class="fas fa-exclamation-circle text-danger m-1"></i><i class="fas fa-exclamation-circle text-danger m-1"><i class="fas fa-exclamation-circle text-danger m-1"><i class="fas fa-exclamation-circle text-danger m-1">
                                    @break
                                    @case(5)
                                   <i class="fas fa-exclamation-circle text-danger m-1"></i><i class="fas fa-exclamation-circle text-danger m-1"><i class="fas fa-exclamation-circle text-danger m-1"><i class="fas fa-exclamation-circle text-danger m-1"><i class="fas fa-exclamation-circle text-danger m-1">
                                    @break
                                    @endswitch
                                </td>
                                <td><a href="/administrador/quejas/eliminar/{{$queja->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                    <a href="/administrador/quejas/revisar/{{$queja->id}}"><i class="fas fa-eye m-2 text-success"></i></a>


                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Usuario</th>
                                <th>Restaurante</th>
                                <th>Fecha</th>
                                <th>Titulo</th>
                                <th>Gravedad</th>
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