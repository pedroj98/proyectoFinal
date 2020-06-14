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
                        <div class="col-lg-6 md-6"><a href='/'><img src="{{url('/media/logo.png')}}"></a></div>
                    </div>
                    <h5 class="card-header text-center">Iniciar Sesion</h5>
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
                        <form action="/login/store" id="login" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="email">Email:</label>
                                    <input id="email" type="email" name="email" required class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="password">Contraseña:</label>
                                    <input id="password" type="password" name="password" required class="form-control" min="8">
                                    <a class=" crearCuenta" href="/registro">Si no tienes una cuenta create una hora mismo</a>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-6 mt-4">
                                    <button type="submit" class="btn botonHome">Entrar</button>

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