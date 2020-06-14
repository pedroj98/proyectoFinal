@extends('../layouts/dashboard')

@section('cuerpo')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Editar Precio de: {{$plato->nombre}}</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/menus" class="breadcrumb-link">Menus</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/menus/platos/{{$menu->id}}" class="breadcrumb-link">Platos del menu: {{$menu->nombre}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar Precio de: {{$plato->nombre}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="card">
            <h5 class="card-header">Precio del plato:</h5>
            <div class="card-body">
                <form action="/administrador/menus/platos/precio/actualizar" id="editaPrecio" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="precio">Precio del plato:</label>
                            <input type="number" class="form-control" id="precio" required name="precio" step=".01">
                            <input type="hidden" name="menu" value="{{$menu->id}}">
                            <input type="hidden" name="plato" value="{{$plato->id}}">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12 pl-0 pt-3 text-center">
                            <p class="text-center">
                                <button type="submit" class="btn btn-space btn-warning">Confirmar Precio</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @endsection