@extends('../layouts/dashboard')

@section('cuerpo')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Crear Empleado</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/empleados" class="breadcrumb-link">Empleados</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nuevo Empleado</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ml-3">
        <div class="card">
            <h5 class="card-header">Datos del Empleado</h5>
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
                <form action="/administrador/empleados/añadir" id="crearEmpleado" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" >

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="pass">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password"  min="8">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" required>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="numero_seguridad_social">Numero de la Seguridad Social:</label>
                            <input type="text" class="form-control" id="numero_seguridad_social" name="numero_seguridad_social" required minlength="11" maxlength="11">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="direccion">Direccion:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="telefono">Telefono:</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" required>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="restaurante">Restaurante Asinga:</label>
                            <select id="restaurante" name="restaurante" class="form-control" name="restaurante">
                                @foreach($restaurantes as $restaurante)
                                <option value="{{ $restaurante->id}}">{{ $restaurante->nombre}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="role">Cargo del Empleado:</label>
                            <select id="role" name="role" class="form-control" name="role">
                                @foreach($roles as $role)
                                <option value="{{ $role->id}}">{{ $role->nombre}}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="sueldo">Sueldo (opcional):</label>
                            <input type="number" class="form-control" id="sueldo" name="sueldo" step="0.01" min="0">
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="imagen">Imagen (opcional):</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/png, image/jpeg">
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