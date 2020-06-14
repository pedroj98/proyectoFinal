@extends('../layouts/home')

@section('cuerpo')

<div class="restaurantes container-fluid">

    <div class="col-12 text-center my-3">
        <h1>Restaurantes</h1>
    </div>
    <div class="row">


        @foreach($restaurantes as $restaurante)

        <div class="col-lg-4 col-md-6 col-sm-12 ">
            <a href="/restaurantes/{{$restaurante->id}}" class="enlace">
                <div class="container ml-1 mr-2 mt-2 mb-2 text-center restauranteEnlace" style="background-image: url('/images/{{$restaurante->imagen}}');">
                    <h4 class="pt-5 nombreRestaurante">{{$restaurante->nombre}}</h4>
                    <p class="pt-3 pb-5 direccion">{{$restaurante->direccion}}</p>
                </div>
            </a>
        </div>
        @endforeach

    </div>
    
</div>


@endsection