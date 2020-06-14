@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Criticas</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Criticas</li>
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
                                <th>Puntuacion</th>
                                <th>Titulo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($criticas as $critica)
                            <tr>
                                <td> {{$critica->usuario->usuario }}</td>
                                <td> {{$critica->restaurante->nombre }}</td>
                                <td> {{$critica->fecha }}</td>
                                <td>
                                    @switch($critica->puntuacion)
                                    @case(1)
                                    <i class="fas fa-star text-warning"></i>
                                    @break

                                    @case(2)
                                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                    @break

                                    @case(3)
                                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                    @break
                                    @case(4)
                                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                    @break
                                    @case(5)
                                    <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                    @break
                                    @endswitch
                                </td>
                                <td> {{$critica->titulo }}</td>
                                <td> {{$critica->estado }}</td>
                                <td><a href="/administrador/criticas/eliminar/{{$critica->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                    @if($critica->estado == 'pendiente')
                                    <a href="/administrador/criticas/revisar/{{$critica->id}}"><i class="fas fa-eye m-2 text-success"></i></a>
                                    @endif

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Usuario</th>
                                <th>Restaurante</th>
                                <th>Fecha</th>
                                <th>Puntuacion</th>
                                <th>Titulo</th>
                                <th>Estado</th>
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