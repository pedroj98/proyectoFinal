<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Gula del Sur</title>
    <link rel="stylesheet" href="{{asset('css/estilosHome.css')}}">
    <link rel="shortcut icon" href="{{url('/media/logo.png')}}" />
</head>

<body>

    <div class="container text-center registro">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 my-5">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-0"></div>
                        <div class="col-lg-6 md-6"><a href="/restaurantes/{{$id_restaurante}}"><img src="{{url('/media/logo.png')}}"></a></div>
                    </div>
                    <h5 class="card-header text-center">Crear Critica</h5>
                    <div class="card-body">
                        <form action="/criticas/añadir" id="crearCritica" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$id_restaurante}}" name="restaurante">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="titulo">Dele un titulo a su critica:</label>
                                    <input id="titulo" type="text" name="titulo" required class="form-control">
                                </div>
                                <div class="col-4"></div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mb-5">
                                    <label for="puntuacion"> Su Puntuacion :</label>
                                    <select id="puntuacion" name="puntuacion" class="form-control" name="puntuacion">
                                        <option value="1">&#9733;</option>
                                        <option value="2">&#9733;&#9733;</option>
                                        <option value="3">&#9733;&#9733;&#9733;</option>
                                        <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                        <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                                    </select>

                                </div>
                                <div class="form-group col-12">
                                    <label for="descripcion">Cuentenos su experiencia:</label>
                                    <textarea name="descripcion" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2" rows="10" required></textarea>
                                </div>

                                <div class="col-3"></div>
                                <div class="col-6 mt-4">
                                    <button type="submit" class="btn botonHome">Crear Critica</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>