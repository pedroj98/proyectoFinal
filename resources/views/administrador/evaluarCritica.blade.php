@extends('../layouts/dashboard')

@section('cuerpo')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Evaluar Critica</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/criticas" class="breadcrumb-link">Criticas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Evaluar Critica</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="card">
            <h5 class="card-header">Contenido de la Critica</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="titulo">Titulo:</label>
                        <input readonly type="text" class="form-control" id="titulo" required name="titulo" value="{{$critica->titulo}}">
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="descripcion">Descripcion:</label>
                        <textarea readonly name="descripcion" id="descripcion" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2" rows="10">{{$critica->descripcion}}</textarea>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 pl-0 pt-3 text-center">
                        <p class="text-center">
                            <a class="btn btn-success mx-3" href="/administrador/criticas/aprobar/{{$critica->id}}" role="button">Publicar Critica </a>
                            <a class="btn btn-danger mx-3" href="/administrador/criticas/eliminar/{{$critica->id}}" role="button">Eliminar Critica</a>
                        </p>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>



    @endsection