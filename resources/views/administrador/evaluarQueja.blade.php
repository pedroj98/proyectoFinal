@extends('../layouts/dashboard')

@section('cuerpo')

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Revisar Queja</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/quejas" class="breadcrumb-link">Quejas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Revisar Queja</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
        <div class="card">
            <h5 class="card-header">Informacion de la Queja</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="titulo">Titulo:</label>
                        <input readonly type="text" class="form-control" id="titulo" required name="titulo" value="{{$queja->titulo}}">
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <label for="descripcion">Descripcion:</label>
                        <textarea readonly name="descripcion" id="descripcion" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2" rows="10">{{$queja->descripcion}}</textarea>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 pl-0 pt-3 text-center">
                        <p class="text-center"> 
                            <a class="btn btn-danger mx-3" href="/administrador/quejas/eliminar/{{$queja->id}}" role="button">Eliminar Queja</a>
                        </p>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>



    @endsection