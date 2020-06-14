@extends('../layouts/dashboard')

@section('cuerpo')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Crear Restaurante</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Restaurantes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nuevo Restaurante</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="card">
            <h5 class="card-header">Datos del Restaurante</h5>
            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-danger text-left">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="/administrador/restaurantes/añadir" id="crearRestaurante" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="nombre">Nombre:</label>
                            <input id="nombre" type="text" name="nombre" data-parsley-trigger="change" required class="form-control">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="direccion">Direccion:</label>
                            <input id="direccion" type="text" name="direccion" data-parsley-trigger="change" required class="form-control">
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="ciudad">Ciudad:</label>
                            <input id="ciudad" type="text" name="ciudad" data-parsley-trigger="change" required class="form-control">
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/png, image/jpeg" required class="form-control">
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="telefono">Numero de Telefono:</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" required>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="menu">Menú:</label>
                            <select id="menu" name="menu" form="crearRestaurante" class="form-control" name="menu">
                                @foreach($menus as $menu)
                                <option value="{{ $menu->id}}">{{ $menu->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="fecha_inauguracion">Fecha de Apertura:</label>
                            <input type="date" class="form-control" id="fecha_apertura" required name="fecha_apertura">

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="hora_apertura">Hora de Apertura:</label>
                            <input type="time" class="form-control" id="hora_apertura" required name="hora_apertura">

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="hora_cierre">Hora de Cierre:</label>
                            <input type="time" class="form-control" id="hora_cierre" required name="hora_cierre">

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