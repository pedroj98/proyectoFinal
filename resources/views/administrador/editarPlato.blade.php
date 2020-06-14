@extends('../layouts/dashboard')

@section('cuerpo')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Editar Plato</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/platos" class="breadcrumb-link">Platos y Bebidas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar Plato</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="card">
            <h5 class="card-header">Datos del Plato</h5>
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
                <form action="/administrador/platos/actualizar/{{$plato->id}}" id="crearPlato" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" required name="nombre" value="{{$plato->nombre}}">
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="categoria">Categoria:</label>
                            <select id="categoria" name="categoria" class="form-control" name="categoria">
                                @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id}}" @if($plato->id_categoria === $categoria->id) selected='selected' @endif >{{ $categoria->nombre}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" value="images/{{$plato->imagen}}">

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                            <label for="descripcion">Descripcion:</label>
                            <textarea name="descripcion" id="descripcion" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2" rows="10">{{$plato->descripcion}}</textarea>
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