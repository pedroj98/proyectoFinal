@extends('../layouts/dashboard')

@section('cuerpo')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Editar Proveedor</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/proveedores" class="breadcrumb-link">Proveedores</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="card">
            <h4 class="card-header">Datos del Proveedor</h4>
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
                <form action="/administrador/proveedores/actualizar/{{$proveedor->id}}" id="editarProveedor" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="nombre">Nombre:</label>
                            <input id="nombre" type="text" name="nombre" data-parsley-trigger="change" required class="form-control" value="{{$proveedor->nombre}}">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="pais">Pais:</label>
                            <input id="pais" type="text" name="pais" data-parsley-trigger="change" required class="form-control" value="{{$proveedor->pais}}">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="direccion">Direccion:</label>
                            <input id="direccion" type="text" name="direccion" data-parsley-trigger="change" required class="form-control" value="{{$proveedor->direccion}}">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="email">Email:</label>
                            <input id="email" type="email" name="email" data-parsley-trigger="change" required class="form-control" value="{{$proveedor->email}}">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="telefono">Telefono:</label>
                            <input id="telefono" type="tel" name="telefono" data-parsley-trigger="change" required class="form-control" value="{{$proveedor->telefono}}">
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-12 pl-0 pt-3 text-center">
                            <p class="text-center">
                                <button type="submit" class="btn btn-space btn-primary">Confirmar Cambios</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @endsection