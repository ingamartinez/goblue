@extends('layouts.newApp')

@section('menu')
    <ul class="nav nav-pills nav-stacked main-menu">
        <li class="nav-header">Main</li>

        <li><a class="ajax-link" href="{{url('/')}}"><i class="glyphicon glyphicon-home"></i><span> Inicio </span></a>
        </li>

        <li class="accordion">
            <a href="#"><i class="glyphicon glyphicon-user"></i><span> Go Blue</span></a>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{url('fordis/create')}}"><i class="glyphicon glyphicon-eye-open"></i> Registrar Go Blue</a></li>
                <li><a href="{{url('fordis')}}"><i class="glyphicon glyphicon-list"></i> Listar Go Blue Registrados</a></li>
                <li><a href="{{url('fordis/show')}}"><i class="glyphicon glyphicon-search"></i> Consultar DMS</a></li>
                {{--<li><a href="{{url('fordispdf/create')}}"><i class="glyphicon glyphicon-list-alt"></i> Generar PDF Sin Foto</a></li>--}}
                {{--<li><a href="{{url('fordispdffoto/create')}}"><i class="glyphicon glyphicon-flag"></i> Generar PDF Con Foto</a></li>--}}
            </ul>
        </li>

        <li><a class="ajax-link" href="{{'/logout'}}"><i class="glyphicon glyphicon-log-out"></i><span> Salir </span></a>
        </li>
    </ul>
@endsection

@section('content')

    <!-- content starts -->
        <div>
            <ul class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Inicio</a>
                </li>
                <li>
                    <a href="{{url('fordis/create')}}">Registrar Go Blue</a>
                </li>
            </ul>
        </div>


        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Validar IDPDV para Go Blue</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i
                                        class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i
                                        class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form method="POST" action="{{route('fordis.store')}}">

                            {{method_field('POST')}}

                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="idpdv">ID PDV</label>
                                        <input type="number" class="form-control" id="idpdv" name="idpdv" placeholder="Ingrese ID PDV" value="24335">
                                        <button type="button" style="margin-top: 5px;" class="btn btn-primary center-block" id="validate">Validar ID PDV</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="cod_sub">Codigo Sub</label>
                                        <input disabled type="text" class="form-control" id="cod_sub">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre del Punto de Venta</label>
                                        <input disabled type="text" class="form-control" id="nombre">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="circuito">Circuito</label>
                                        <input disabled type="text" class="form-control" id="circuito">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="vendedor">Vendedor</label>
                                        <input disabled type="text" class="form-control" id="vendedor">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="tipo_punto">Tipo de Punto</label>
                                        <input disabled type="text" class="form-control" id="tipo_punto">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="epin">Servicio EPIN</label>
                                        <input disabled type="text" class="form-control" id="epin">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="simcard">Servicio SIMCARD</label>
                                        <input disabled type="text" class="form-control" id="simcard">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="tigo_gestion">Servicio TIGO GESTION</label>
                                        <input disabled type="text" class="form-control" id="tigo_gestion">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="zona">Zona</label>
                                        <input disabled type="text" class="form-control" id="zona">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input disabled type="text" class="form-control" id="estado">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="form-group">
                                        <label for="cod_sub">Observaciones</label>
                                        <textarea class="form-control" placeholder="" id="observaciones" rows="3" onkeyup="format(this)" onchange="format(this)" name="observaciones" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Guardar</button>


                        </form>

                    </div>
                </div>
            </div>
        </div><!--/row-->

    <!-- content ends -->
@endsection

@push('script')
    <script>
//        $(document).ready(function () {
//            $('#example').dataTable({
//                "language": {
//                    url: "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
//                },
//                lengthMenu: [
//                    [10, 25, 50, -1],
//                    [10, 25, 50, "All"]
//                ],
//                filter: true,
//                sort: true,
//                info: true,
//                autoWidth: true,
//                order: [
//                    [0, "desc"]
//                ],
//                aoColumnDefs: [{
//                    bSortable: false,
//                    "aTargets": [-1]
//                }]
//            });
//        });

        $('#validate').on('click', function (e) {
            e.preventDefault();
            limpiarPuntoDeVenta();

            let idpdv=$('#idpdv').val();

            validarDMS(idpdv);

        });
        function validarDMS(idpdv) {
            $.ajax({
                type: 'GET',
                url: '/dms/' + idpdv,
                success: function (data) {

                    validarGoBlue(idpdv);

                    $('#cod_sub').val(data.COD_SUB);
                    $('#nombre').val(data.nombre_punto);
                    $('#circuito').val(data.circuito);
                    $('#vendedor').val(data.NOMBRE_ASESOR);
                    $('#tipo_punto').val(data.TIPO_PUNTO);
                    $('#epin').val(data.SERV_EPIN);
                    $('#simcard').val(data.SERV_SIMCARD);
                    $('#tigo_gestion').val(data.SERV_MBOX);
                    $('#zona').val(data.CIUDAD);
                    $('#estado').val(data.ESTADO);

                },
                error:function ( qXHR, textStatus, errorThrown) {
//                    console.log(qXHR.status,textStatus,errorThrown);
                    swal(
                        'IDPDV no Encontrado',
                        'Por favor validar si el IDPDV fue ingresado correctamente',
                        'error'
                    )
                }
            });
        }
        function validarGoBlue(idpdv) {
            $.ajax({
                type: 'GET',
                url: '/goblue/' + idpdv,
                success:function (data) {
                    console.log(data);
                    limpiarPuntoDeVenta();
                    swal(
                        'IDPDV ya existe como Go Blue',
                        'Por favor inregresar otro IDPDV',
                        'error'
                    );
                }
            });
        }
        function limpiarPuntoDeVenta() {
            $('#cod_sub').val('');
            $('#nombre').val('');
            $('#circuito').val('');
            $('#vendedor').val('');
            $('#tipo_punto').val('');
            $('#epin').val('');
            $('#simcard').val('');
            $('#tigo_gestion').val('');
            $('#zona').val('');
            $('#estado').val('');

        }

    </script>
@endpush