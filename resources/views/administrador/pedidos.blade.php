@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Pedidos</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
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
                                <th>Direccion</th>
                                <th>Restaurante</th>
                                <th>Fecha</th>
                                <th>Platos</th>
                                <th>Precio Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)

                            @php
                            $cantidad = 0
                            @endphp
                            @foreach($pedido->factura->platos as $plato)
                            @php
                            $cantidad+=$plato->pivot->cantidad
                            @endphp
                            @endforeach
                            <tr>
                                <td> {{$pedido->cliente->usuario }}</td>
                                <td> {{$pedido->cliente->direccion }}</td>
                                <td> {{$pedido->factura->restaurante->nombre }}</td>
                                <td> {{$pedido->fecha}}</td>
                                <td> {{$cantidad}} <a href="/administrador/facturas/clientes/platos/{{$pedido->factura->id}}"><i class="fas fa-eye m-2 text-success"></i></a> </td>
                                <td> {{$pedido->factura->total}}</td>
                                <td><a href="/administrador/pedidos/eliminar/{{$pedido->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cliente</th>
                                <th>Direccion</th>
                                <th>Restaurante</th>
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