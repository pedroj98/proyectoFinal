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
                        <div class="col-lg-6 md-6"><a href="/"><img src="{{url('/media/logo.png')}}"></a></div>
                    </div>
                    <h5 class="card-header text-center">Crear Cuenta</h5>
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


                        <form action="/registro/crear" id="registro" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="usuario">Nombre de Usuario:</label>
                                    <input id="usuario" type="text" name="usuario" required class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="email">Email:</label>
                                    <input id="email" type="email" name="email" required class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="password">Contraseña:</label>
                                    <input id="password" type="password" name="password" required class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="repass">Repita Contraseña: </label>
                                    <input id="repass" type="password" name="repass" min="8" required class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="direccion">Direccion:</label>
                                    <input id="direccion" type="text" name="direccion" min="8" required class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="telefono">Telefono:</label>
                                    <input id="telefono" type="tel" name="telefono" required class="form-control">
                                </div>

                                <div class="form-group col-12">
                                    <label for="imagen">Foto de Perfil (opcional):</label>
                                    <input id="imagen" type="file" name="imagen" class="form-control">
                                </div>
                                <div class="col-3"></div>
                                <div class="col-6 mt-4">
                                    <button type="submit" class="btn botonHome">Crear Cuenta</button>

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