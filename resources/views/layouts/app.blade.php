<!DOCTYPE html>
<html lang="es">
<head>

    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>@yield('title', 'GO BLUE')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- The styles -->
    <link id="bs-css" href="{{asset('css/bootstrap-cerulean.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/charisma-app.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.css')}}" rel='stylesheet'>
    <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
    <link href="{{asset('bower_components/chosen/chosen.min.css')}}" rel='stylesheet'>
    <link href="{{asset('bower_components/colorbox/example3/colorbox.css')}}" rel='stylesheet'>
    <link href="{{asset('bower_components/responsive-tables/responsive-tables.css')}}" rel='stylesheet'>
    <link href="{{asset('bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css')}}" rel='stylesheet'>
    <link href="{{asset('css/jquery.noty.css')}}" rel='stylesheet'>
    <link href="{{asset('css/noty_theme_default.css')}}" rel='stylesheet'>
    <link href="{{asset('css/elfinder.min.css')}}" rel='stylesheet'>
    <link href="{{asset('css/elfinder.theme.css')}}" rel='stylesheet'>
    <link href="{{asset('css/jquery.iphone.toggle.css')}}" rel='stylesheet'>
    <link href="{{asset('css/uploadify.css')}}" rel='stylesheet'>
    <link href="{{asset('css/animate.min.css')}}" rel='stylesheet'>

    <!-- jQuery -->
    <script src="{{asset('bower_components/jquery/jquery.min.js')}}"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}"/>


    <script src="{{asset('js/jquery-ui.js')}}"></script>

    <script>
        $(function () {
            $("#datepicker1").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "2016:2017"
            });

            $("#datepicker2").datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "2016:2017"
            });
            $("#datepicker3").datepicker();
            $("#datepicker4").datepicker();
            $("#datepicker5").datepicker();
            $("#datepicker6").datepicker();
        });
    </script>

    <script>
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
        $(function () {
            $("#fecha").datepicker();
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Reporte gráfico de la gestion en calle'
                },
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'cantidad PDA/PDV'
                    }
                },
                credits: {
                    enabled: false
                }, plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                tooltip: {
                    formatter: function () {
                        return '<b>' + this.point.y + '</b><br/>' +
                            this.series.name + ' ' + this.point.name.toLowerCase();
                    }
                }
            });
        });
    </script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>


<body>
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand"> <img alt="Charisma Logo" src="{{asset('img/logo20.png')}}" class="hidden-xs"/>
            <span>GO BLUE</span>
        </a>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle animated flip" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>{{ @Auth::user()->nombre_sup }}<span
                        class="hidden-sm hidden-xs">
				</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li class="divider"></li>
                <li><a href="{{url('logout')}}">Cerrar Sesión</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->

        <!-- theme selector starts
        <div class="btn-group pull-right theme-container animated tada">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-tint"></i><span
                class="hidden-sm hidden-xs">Cambiar el diseño</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" id="themes">
                <li><a data-value="classic" href="#"><i class="whitespace"></i> estilo 1</a></li>
                <li><a data-value="cerulean" href="#"><i class="whitespace"></i> estilo 2</a></li>
                <li><a data-value="cyborg" href="#"><i class="whitespace"></i> estilo 3</a></li>
                <li><a data-value="simplex" href="#"><i class="whitespace"></i> estilo 4</a></li>
                <li><a data-value="darkly" href="#"><i class="whitespace"></i> estilo 5</a></li>
                <li><a data-value="lumen" href="#"><i class="whitespace"></i> estilo 6</a></li>
                <li><a data-value="slate" href="#"><i class="whitespace"></i> estilo 7</a></li>
                <li><a data-value="spacelab" href="#"><i class="whitespace"></i> estilo 8</a></li>
                <li><a data-value="united" href="#"><i class="whitespace"></i> estilo 9</a></li>
            </ul>
        </div>
        -->
        <!-- theme selector ends -->

        <!-- <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                    class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
            <li>
                <form class="navbar-search pull-left">
                    <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                    type="text">
                </form>
            </li>
        </ul>-->
    </div>
</div>
<!-- topbar ends -->
<div class="ch-container">
    <div class="row">

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Menú</li>

                        @if(Auth::check())

                            @if(Auth::user()->rol->rol=="Administrador")
                                @include('layouts.appAdmin')
                            @else
                                @if(Auth::user()->rol->rol=="CallCenter")
                                    @include('layouts.appCallCenter')
                                @else
                                    @include('layouts.appAsesor')
                                @endif
                            @endif


                        @endif


                    </ul>
                    <!--<label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>-->
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.
                </p>
            </div>
        </noscript>

        <!-- content starts -->
        <div id="content" class="col-lg-10 col-sm-10">


            <div>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <!--<a href="#">Blank</a>-->
                    </li>
                </ul>
            </div>

            @section('contenido')

                <div class="row">
                    <div class="box col-md-12">
                        <div class="box-inner">
                            <div class="box-header well" data-original-title="">
                                <h2><i class="glyphicon glyphicon-star-empty"></i>
                                    @yield('titulo_operacion')
                                </h2>

                                <div class="box-icon">
                                    <!-- <a href="#" class="btn btn-setting btn-round btn-default"><i
                                        class="glyphicon glyphicon-cog"></i>
                                    </a>-->
                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                                class="glyphicon glyphicon-chevron-up"></i>
                                    </a>
                                    <!-- <a href="#" class="btn btn-close btn-round btn-default"><i
                                        class="glyphicon glyphicon-remove"></i>-->
                                    </a>
                                </div>
                            </div>
                            <div class="box-content">

                            @yield('content')

                            <!-- put your content here -->
                            </div>
                        </div>
                    </div>
                </div><!--/row-->

        @show
        <!-- content ends -->
        </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->

    <!-- Ad, you can remove it -->


    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Configuración</h3>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                    <!--<a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>-->
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="{{url('/')}}" target="_blank">Amcom SA</a> {{date('Y')}}</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">App creada por: <a
                    href="https://www.desarrolloexperto.com">Desarrollo Expero</a></p>
    </footer>

    {{--<footer class="row">--}}
        {{--<p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad--}}
                {{--Usman</a> 2012 - 2015</p>--}}

        {{--<p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a--}}
                    {{--href="http://usman.it/free-responsive-admin-template">Charisma</a></p>--}}
    {{--</footer>--}}

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- library for cookie management -->
<script src="{{asset('js/jquery.cookie.js')}}"></script>
<!-- calender plugin -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>

<!-- data table plugin -->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

<!-- select or dropdown enhancer -->
<script src="{{asset('bower_components/chosen/chosen.jquery.min.js')}}"></script>
<!-- plugin for gallery image view -->
<script src="{{asset('bower_components/colorbox/jquery.colorbox-min.js')}}"></script>
<!-- notification plugin -->
<script src="{{asset('js/jquery.noty.js')}}"></script>
<!-- library for making tables responsive -->
<script src="{{asset('bower_components/responsive-tables/responsive-tables.js')}}"></script>
<!-- tour plugin -->
<script src="{{asset('bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js')}}"></script>
<!-- star rating plugin -->
<script src="{{asset('js/jquery.raty.min.js')}}"></script>
<!-- for iOS style toggle switch -->
<script src="{{asset('js/jquery.iphone.toggle.js')}}"></script>
<!-- autogrowing textarea plugin -->
<script src="{{asset('js/jquery.autogrow-textarea.js')}}"></script>
<!-- multiple file upload plugin -->
<script src="{{asset('js/jquery.uploadify-3.1.min.js')}}"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{asset('js/jquery.history.js')}}"></script>


<!-- application script for Charisma demo -->
<script src="{{asset('js/charisma.js')}}"></script>

<script>
    var BASEURL = '{{ url('/') }}';
</script>


@section('script_fin')

@show
</body>

</html>