@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Reservas</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reservas</li>
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
                                <th>Cliente</th>
                                <th>Restaurante</th>
                                <th>Mesa</th>
                                <th>Num de Comensales</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $reserva)
                            <tr>
                                <td> {{$reserva->cliente->usuario }}</td>
                                <td> {{$reserva->mesa->restaurante->nombre }}</td>
                                <td> {{$reserva->id_mesa }}</td>
                                <td> {{$reserva->num_comensales }}</td>
                                <td> {{$reserva->fecha }}</td>
                                <td> {{$reserva->hora }}</td>
                                <td><a href="/administrador/reservas/eliminar/{{$reserva->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Restaurante</th>
                                <th>Mesa</th>
                                <th>Num de Comensales</th>
                                <th>Fecha</th>
                                <th>Hora</th>
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