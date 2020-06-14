<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{asset('css/estilosDashboard.css')}}">
    <link rel="shortcut icon" href="{{url('/media/logo.png')}}" />
    <title>La Gula del Sur -- Panel de Control</title>
</head>

<body>

    <div class="dashboard-main-wrapper">

        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="/administrador/restaurantes">Panel de Control</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user ">
                            <a class="nav-link nav-user-img " href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ URL::to('/') }}/images/{{ Auth::user()->imagen }}" class="user-avatar-md rounded-circle "></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->usuario }} </h5>
                                </div>
                                <a class="dropdown-item" href="/administrador/editar"><i class="fas fa-cog mr-2"></i>Editar</a>
                                <a class="dropdown-item" href="/login/destroy/{{ Auth::user()->id }}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <h3 class="nav-divider text-center">
                                Menu
                            </h3>
                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/restaurantes"><i class="fas fa-utensils"></i>Restaurantes </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/empleados"><i class="fas fa-users"></i>Empleados </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/clientes"><i class="fas fa-user"></i>Clientes </a>
                            </li>
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-comment-dots"></i>Opiniones</a>
                            <div id="submenu-3" class="collapse submenu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/administrador/criticas">Criticas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/administrador/quejas">Quejas</a>
                                    </li>
                                </ul>
                            </div>
                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/menus"><i class="m-r-10 mdi mdi-book"></i>Menús </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/platos"><i class="m-r-10 mdi mdi-food"></i>Platos </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/ingredientes"><i class="m-r-10 mdi mdi-food-apple"></i>Ingredientes </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/proveedores"><i class=" fas fa-truck-loading"></i>Proveedores </a>
                            </li>

                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class=" fas fa-dollar-sign"></i></i>Facturacion</a>
                            <div id="submenu-2" class="collapse submenu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/administrador/facturas/clientes">Facturas Clientes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/administrador/facturas/proveedores">Facturas Proveedores</a>
                                    </li>
                                </ul>
                            </div>
                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/reservas"><i class="fas fa-flag"></i>Reservas </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="/administrador/pedidos"><i class=" fas fa-hand-holding-usd"></i>Pedidos </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">

                    @yield('cuerpo')

                </div>

            </div>

        </div>
        <!-- script menu  -->
        <script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>

        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

        <script src="{{asset('vendor/slimscroll/jquery.slimscroll.js')}}"></script>




        <!-- script tables  -->

        <script src="{{asset('vendor/datatables/js/data-table.js')}}"></script>

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <script src="{{asset('vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>

       

</body>

</html>