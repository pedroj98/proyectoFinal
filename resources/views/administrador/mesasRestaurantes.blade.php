@extends('../layouts/dashboard')

@section('cuerpo')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Mesas de: {{$restaurante->nombre}}</h2>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Panel de Control</a></li>
                        <li class="breadcrumb-item"><a href="/administrador/restaurantes" class="breadcrumb-link">Restaurantes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mesas de: {{$restaurante->nombre}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header"><a href="/administrador/restaurantes/mesas/crear/{{$restaurante->id}}" class="btn btn-outline-info">Añadir Mesa</a></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first text-center">
                        <thead>
                            <tr>
                                <th>Identificador Mesa</th>
                                <th>Numero de Sillas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mesas as $mesa)
                            <tr>
                                <td>{{$mesa->id}}</td>
                                <td data-id='{{$mesa->id}}'><i class="fas fa-minus text-danger restarSilla"></i> &nbsp;&nbsp;<span class="sillas">{{ $mesa->num_sillas }}</span> &nbsp;&nbsp; <i class="fas fa-plus text-success sumarSilla"></i></td>
                                <td><a href="/administrador/restaurantes/mesas/eliminar/{{$mesa->id}}"><i class="fas fa-trash-alt text-danger m-2"></i></a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Identificador de Mesa</th>
                                <th>Numero de Sillas</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<script>
    $(document).ready(function() {

        //al hacer click en el boton - se decrementa en 1 el numero de sillas de una determinada mesa
        $('.restarSilla').click(function(e) {

            var sillas = $(this).closest('td').find('.sillas');
            if (sillas.text() > 1) {

                sillas.text(sillas.text() - 1);

                var id = $(this).closest('td').data("id");


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ url('/administrador/restaurantes/mesas/cambiarSillas/') }}",
                    method: 'post',
                    data: {
                        id: id,
                        sillas: sillas.text()
                    }
                });
            }
        });

        //al hacer click en el boton + se incrementa en 1 el numero de sillas de una determinada mesa
        $('.sumarSilla').on('click', function(e) {

            var sillas = $(this).closest('td').find('.sillas');
            sillas.text(parseInt(sillas.text()) + 1);

            var id = $(this).closest('td').data("id");


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/administrador/restaurantes/mesas/cambiarSillas/') }}",
                method: 'post',
                data: {
                    id: id,
                    sillas: sillas.text()
                }
            });

        });



    });
</script>


@endsection