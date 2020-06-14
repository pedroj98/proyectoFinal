@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Facturacion Clientes</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Facturacion Clientes</li>
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
                                <th>Empleado</th>
                                <th>Fecha</th>
                                <th>Platos</th>
                                <th>Precio Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facturas as $factura)
                            @php
                            $cantidad = 0
                            @endphp
                            @foreach($factura->platos as $plato)
                            @php
                            $cantidad+=$plato->pivot->cantidad
                            @endphp
                            @endforeach
                            <tr>
                                <td>{{ $factura->cliente->usuario }}</td>
                                <td>{{ $factura->restaurante->nombre }}</td>
                                <td>{{ $factura->empleado->nombre ?? 'es un pedido'}}</td>
                                <td>{{ $factura->fecha }}</td>
                                <td>{{ $cantidad }}
                                    @if($cantidad>0)
                                    <a href="/administrador/facturas/clientes/platos/{{$factura->id}}"><i class="fas fa-eye m-2 text-success"></i></a>
                                    @endif</td>
                                <td>{{ $factura->total  }} €</td>
                                <td><a href="/administrador/facturas/clientes/eliminar/{{$factura->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Restaurante</th>
                                <th>Empleado</th>
                                <th>Fecha</th>
                                <th>Platos</th>
                                <th>Precio Total</th>
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