@extends('layouts.newApp')

@section('menu')
    @include('partials.menu')
@endsection

@section('content')

    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Inicio</a>
            </li>
            <li>
                <a href="{{url('goblue/create')}}">Registrar Go Blue</a>
            </li>
        </ul>
    </div>

    @if (Session::has('mensaje'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Ohh! </strong>{{ Session::get('mensaje') }}
        </div>
    @endif

    @if (Session::has('mensajeExito'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Bien! </strong> {{ Session::get('mensajeExito') }}
        </div>
    @endif

    <form method="POST" action="{{route('goblue.store')}}" id="formRegistrarGoBlue" role="form" data-toggle="validator" autocomplete="off" enctype="multipart/form-data">

        {{method_field('POST')}}

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Validar IDPDV para Go Blue</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">


                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="idpdv">ID PDV</label>
                                    <input type="number" class="form-control" id="idpdv" name="idpdv" placeholder="Ingrese ID PDV" value="10648" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                    <button type="button" style="margin-top: 5px;" class="btn btn-primary center-block"
                                            id="validate">Validar ID PDV
                                    </button>
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
                                <div class="form-group has-feedback">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea class="form-control" placeholder="" id="observaciones" rows="3" name="observaciones"
                                              cols="50" required></textarea>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/row-->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Preguntas GO BLUE - Parte 1</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="serv_wifi">¿Cuenta con servicio de internet wifi?</label>

                                    <select class="form-control" name="serv_wifi" id="serv_wifi" required >
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="atendido_por">¿El punto es atendido por?</label>

                                    <select class="form-control" name="atendido_por" id="atendido_por" required>
                                        <option value=""> Escoja una opción</option>
                                        <option value="DUEÑO">Dueño</option>
                                        <option value="DEPENDIENTE">Dependiente</option>
                                        <option value="AMBOS">Ambos</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="tablet">¿Tiene Tablet?</label>

                                    <select class="form-control" name="tablet" id="tablet" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="portatil">¿Tiene Computador portatil?</label>

                                    <select class="form-control" name="portatil" id="portatil" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="vende_smartphone">¿Vende Smartphone?</label>

                                    <select class="form-control" name="vende_smartphone" id="vende_smartphone" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="exclusividad_tigo">¿Acepta exclusividad de la marca Tigo?</label>

                                    <select class="form-control" name="exclusividad_tigo" id="exclusividad_tigo" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="exp_alcance_proyecto">¿Explicación de los alcance del proyecto?</label>

                                    <select class="form-control" name="exp_alcance_proyecto" id="exp_alcance_proyecto" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="infr_goblue">¿Tiene la Infraestructura adecuada para GO BLUE?</label >

                                    <select class="form-control" name="infr_goblue" id="infr_goblue" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="BUENA">Buena</option>
                                        <option value="REGULAR">Regular</option>
                                        <option value="MALA">Mala</option>
                                        
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="visibilidad">¿Tiene buena visibilidad desde el exterior?</label>

                                    <select class="form-control" name="visibilidad" id="visibilidad" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="ccc">¿Tiene Camara de Camara de Comercio?</label>

                                    <select class="form-control" name="ccc" id="ccc" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="rut">¿Tiene Rut?</label>

                                    <select class="form-control" name="rut" id="rut" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="deposito">¿En caso de aceptar el servicio de pago de factura puede dar un deposito de $1.000.000?</label>

                                    <select class="form-control" name="deposito" id="deposito" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="disp_gestion_tigo">¿Disponibilidad de recursos humano para hacer la gestion de tigo?</label>

                                    <select class="form-control" name="disp_gestion_tigo" id="disp_gestion_tigo" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!--/row-->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Preguntas GO BLUE - Parte 2</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="barrio">Barrio</label>
                                    <input type="text" class="form-control" id="barrio" name="barrio" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="dir_serv_publico">Direccion del recibo servicio publico</label>
                                    <input type="text" class="form-control" id="dir_serv_publico" name="dir_serv_publico" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="nombre_apellido_dueño">Nombre y Apellidos del dueño del negocio</label>
                                    <input type="text" class="form-control" id="nombre_apellido_dueño" name="nombre_apellido_dueño" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="tel_contacto">Telefono de contacto</label>
                                    <input type="number" class="form-control" id="tel_contacto" name="tel_contacto" placeholder="" required >
                                           {{--pattern="[0-9]{10}|[0-9]{7}" data-error="Ingrese 10 caracteres para celular o 7 caracteres para telefono fijo"--}}
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="correo">Correo Eletronico</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="ancho">Medidas del local en Cts (Ancho)</label>
                                    <input type="number" step="any" class="form-control" id="ancho" name="ancho" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="fondo">Medidas del local en Cts (Fondo)</label>
                                    <input type="number" step="any" class="form-control" id="fondo" name="fondo" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="alto">Medidas del local en Cts (Alto)</label>
                                    <input type="number" step="any"  class="form-control" id="alto" name="alto" placeholder="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!--/row-->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Preguntas GO BLUE - Parte 3</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="aviso">¿Necesita aviso?</label>

                                    <select class="form-control" name="aviso" id="aviso" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="lona">¿Necesita lona?</label>

                                    <select class="form-control" name="lona" id="lona" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="luz">¿Necesita caja de luz?</label>

                                    <select class="form-control" name="luz" id="luz" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="bastidor">¿Necesita bastidor?</label>

                                    <select class="form-control" name="bastidor" id="bastidor" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="toldo">¿Necesita toldo para fachada exterior?</label>

                                    <select class="form-control" name="toldo" id="toldo" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="pintura_ext">¿Necesita pintura exterior?</label>

                                    <select class="form-control" name="pintura_ext" id="pintura_ext" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="pintura_int">¿Necesita pintura interior?</label>

                                    <select class="form-control" name="pintura_int" id="pintura_int" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="vinilo">¿Necesita vinilo?</label>

                                    <select class="form-control" name="vinilo" id="vinilo" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="SI">Si</option>
                                        <option value="NO">No</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="estado">Estado de la solicitud</label>

                                    <select class="form-control" name="estado" id="estado" required>
                                        <option value="">Escoja una opción</option>
                                        <option value="FUNCIONANDO">Funcionando</option>
                                        <option value="CONCRETADO">Concretado</option>
                                        <option value="PENDIENTE">Pendiente</option>
                                        <option value="NO INTERESADO">No Interesado</option>
                                        <option value="RETIRADO">Retirado</option>
                                        <option value="NO APLICA">No Aplica</option>
                                    </select>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!--/row-->
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-star"></i> Preguntas GO BLUE - Parte 4</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="img_fachada">Foto #1 Fachada</label>
                                    <input id="img_fachada" name="img_fachada" accept="image/*" type="file" capture="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="img_interna">Foto #2 Interna</label>
                                    <input id="img_interna" name="img_interna" accept="image/*" type="file" capture="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="img_panoramica">Foto #3 Panoramica</label>
                                    <input id="img_panoramica" name="img_panoramica" accept="image/*" type="file" capture="" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" form="formRegistrarGoBlue" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div><!--/row-->

    </form>

    <!-- content ends -->
@endsection

@push('script')
<script>

    $('#validate').on('click', function (e) {
        e.preventDefault();

        let idpdv = $('#idpdv').val();
        if(idpdv===""){
            idpdv=0;
        }
        validarDMS(idpdv);

    });

    function validarDMS(idpdv) {
        $.ajax({
            type: 'GET',
            url: '{{url('dms')}}/' + idpdv,
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
            error: function (qXHR, textStatus, errorThrown) {
//                    console.log(qXHR.status,textStatus,errorThrown);
                limpiarPuntoDeVenta();
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
            url: '{{url('goblue')}}/' + idpdv,
            success: function (data) {
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
        let form = $('#formRegistrarGoBlue');
        form.find('input').val('');
        form.find('textarea').val('');
        form.validator("validate");
    }
</script>
@endpush