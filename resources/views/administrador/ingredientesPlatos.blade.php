@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Ingredientes de {{$plato->nombre}} </h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/platos" class="breadcrumb-link">Platos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ingredientes de {{$plato->nombre}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
        <div class="card-header"><a href="/administrador/platos/ingredientes/editar/{{$plato->id}}" class="btn btn-outline-danger">Asignar Ingredientes</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first text-center">
                        <thead>
                            <tr>
                                <th>Ingredientes</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($plato->ingredientes as $ingrediente)
                            <tr>
                                <td>{{ $ingrediente->nombre }}</td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Plato</th>
                               
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection