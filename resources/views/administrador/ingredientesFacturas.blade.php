@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Contenido de la Factura</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/facturas/proveedores" class="breadcrumb-link">Facturas Proveedores</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contenido de la Factura</li>
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
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($factura->ingredientes as $ingrediente)
                            <tr>
                                <td>{{ $ingrediente->codigo }}</td>
                                <td>{{ $ingrediente->nombre }}</td>
                                <td>{{ $ingrediente->pivot->cantidad }}</td>
                                <td>{{ $ingrediente->pivot->precio }} €</td>
                                <td>{{ $ingrediente->pivot->precio * $ingrediente->pivot->cantidad }} €</td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Codigo</th>
                                <th>Ingrediente</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection