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
                <a href="#">Inicio</a>
            </li>
        </ul>
    </div>


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well">
                    <h2><i class="glyphicon glyphicon-globe"></i> AMCOM S.A</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content row">
                    <div class="col-lg-7 col-md-12">
                        <h1>GO BLUE<br>
                            <small></small>
                        </h1>
                        <p></p>

                        <p><b>* RESGISTRAR PUNTOS GO BLUE</b></p>
                        <p><b>* SON 3 FOTOS POR GO BLUE OBLIGATORIAS</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content ends -->


@endsection

