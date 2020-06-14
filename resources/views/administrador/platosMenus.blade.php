@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Platos del Menu: {{$menu->nombre}}</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/menus" class="breadcrumb-link">Menus</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Platos del Menu: {{$menu->nombre}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header"><a href="/administrador/menus/platos/editar/{{$menu->id}}" class="btn btn-outline-danger">Organizar Menu</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first text-center">
                        <thead>
                            <tr>
                                <th>Plato</th>
                                <th>Categoria</th>
                                <th>Imagen</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menu->platos as $plato)
                            <tr>
                                <td>{{ $plato->nombre }}</td>
                                <td>{{ $plato->categoria->nombre }}</td>
                                <td><img src="{{ URL::to('/') }}/images/{{ $plato->imagen }}" width="100" height="100" /></td>
                                <td>{{ $plato->pivot->precio}} €</td>
                                <td><a href="/administrador/menus/platos/precio/{{$menu->id}}/{{$plato->id}}"><i class="fas fa-money-bill-alt text-success h2"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Plato</th>
                                <th>Categoria</th>
                                <th>Imagen</th>
                                <th>Precio</th>
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