@extends('../layouts/dashboard')

@section('cuerpo')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Crear Mesa</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Restaurantes</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes/{{$restaurante->id}}" class="breadcrumb-link">Mesas de: {{$restaurante->nombre}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crear Mesa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="card">
            <h5 class="card-header">Datos de las Mesas</h5>
            <div class="card-body">
                <form action="/administrador/restaurantes/mesas/añadir" id="crearMesa"   method="post">
                @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="mesas">Numero de Mesas:</label>
                            <input type="number" min="1"  value="1" class="form-control" id="mesas" required name="mesas">
                            <input type="hidden" value="{{$restaurante->id}}" name="restaurante">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="sillas">Numero de Sillas por Mesa:</label>
                            <input type="number" min="1" value="1" class="form-control" id="sillas" required name="sillas">
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12 pl-0 pt-3 text-center">
                            <p class="text-center">
                                <button type="submit" class="btn btn-space btn-primary">Crear</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @endsection