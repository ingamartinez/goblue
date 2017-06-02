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
                <a href="{{url('goblue')}}">Listar Go Blue</a>
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

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-star"></i> Listado de Go Blue</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
                            <thead>

                            <th> # </th>
                            <th> ID PDV </th>
                            <th> Nombre del punto </th>
                            <th> Circuito </th>
                            <th> Estado </th>
                            <th> Supervisor AMCOM S.A </th>
                            <th> Sucursal Dealer </th>
                            <th> Creado </th>
                            <th> Modificado </th>
                            <th> Observaciones </th>
                            <th> Foto de la Fachada </th>
                            <th> Foto del interior </th>
                            <th> Foto Panoramica </th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($goBlues as $goBlue)
                                <tr data-id="{{$goBlue->id}}">
                                    <td>{{$goBlue->id}}</td>
                                    <td>{{$goBlue->idpdv}}</td>
                                    <td>{{$goBlue->nombre_punto}}</td>
                                    <td>{{$goBlue->circuito}}</td>
                                    <td>{{$goBlue->estado}}</td>
                                    <td>{{$goBlue->supervisor}}</td>
                                    <td>{{$goBlue->sucursal_dealer}}</td>
                                    <td>{{$goBlue->created_at}}</td>
                                    <td>{{$goBlue->updated_at}}</td>
                                    <td>{{$goBlue->observaciones}}</td>
                                    <td><a target="_blank" href="{{asset('imagenes/'.$goBlue->ruta_imagen1)}}"><img width="90" src="{{asset('imagenes/min/'.$goBlue->ruta_imagen1)}}" class="img-responsive"></a></td>
                                    <td><a target="_blank" href="{{asset('imagenes/'.$goBlue->ruta_imagen2)}}"><img width="90" src="{{asset('imagenes/min/'.$goBlue->ruta_imagen2)}}" class="img-responsive"></a></td>
                                    <td><a target="_blank" href="{{asset('imagenes/'.$goBlue->ruta_imagen3)}}"><img width="90" src="{{asset('imagenes/min/'.$goBlue->ruta_imagen3)}}" class="img-responsive"></a></td>

                                    <td>
                                       <a class="btn btn-primary" href="{{route('goblue.edit',$goBlue->id)}}">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div><!--/row-->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "language": {
                    url: "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
                },
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                filter: true,
                sort: true,
                info: true,
                autoWidth: true,
                order: [
                    [0, "desc"]
                ],
                aoColumnDefs: [{
                    bSortable: false,
                    "aTargets": [-1]
                }]
            });
        });
    </script>
@endpush