<?php

namespace App\Http\Controllers;

use App\Dms;
use App\Goblue;
use Illuminate\Http\Request;

class GoBlueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('goblue.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goblue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $ruta_imagen1= \Request::input('idpdv');
            $ruta_imagen1= $ruta_imagen1.'_fachada_'.date('d-m-y');
            $nombredelpunto=\Request::input('nombre_punto');
            $ruta_imagen1=$ruta_imagen1.'_'.$nombredelpunto.'.jpg';
            $destinationPath ='imagenes';
            $request->file('img_fachada')->move($destinationPath, $ruta_imagen1);

            $ruta_imagen2= \Request::input('idpdv');
            $ruta_imagen2= $ruta_imagen2.'_interior_'.date('d-m-y');
            $nombredelpunto=\Request::input('nombre_punto');
            $ruta_imagen2=$ruta_imagen2.'_'.$nombredelpunto.'.jpg';
            $destinationPath ='imagenes';
            $request->file('img_interna')->move($destinationPath, $ruta_imagen2);

            $ruta_imagen3= \Request::input('idpdv');
            $ruta_imagen3= $ruta_imagen3.'_panoramica_'.date('d-m-y');
            $nombredelpunto=\Request::input('nombre_punto');
            $ruta_imagen3=$ruta_imagen3.'_'.$nombredelpunto.'.jpg';
            $destinationPath ='imagenes';
            $request->file('img_panoramica')->move($destinationPath, $ruta_imagen3);

//        dd($request->rut);

            $goBlue = new Goblue();

            $goBlue->idpdv = $request->input('idpdv');
            $goBlue->observaciones = $request->input('observaciones');
            $goBlue->wifi = $request->input('serv_wifi');
            $goBlue->atendido_por = $request->input('atendido_por');
            $goBlue->tablet = $request->input('tablet');
            $goBlue->portatil = $request->input('portatil');
            $goBlue->vende_smartphone = $request->input('vende_smartphone');
            $goBlue->acepta_exclusividad_tigo = $request->input('exclusividad_tigo');
            $goBlue->disponibilidad_personas_tigo = $request->input('disp_gestion_tigo');
            $goBlue->alcance = $request->input('exp_alcance_proyecto');
            $goBlue->infraestructura = $request->input('infr_goblue');
            $goBlue->visibilidad_exterior = $request->input('visibilidad');
            $goBlue->camara_comercio = $request->input('ccc');
            $goBlue->rut = $request->input('rut');
            $goBlue->base_dinero_goblue = $request->input('deposito');
            $goBlue->barrio = $request->input('barrio');
            $goBlue->direccion = $request->input('dir_serv_publico');
            $goBlue->nombre_apellidos_boss = $request->input('nombre_apellido_dueño');
            $goBlue->telefono_contacto = $request->input('tel_contacto');
            $goBlue->email = $request->input('correo');
            $goBlue->medidas_cts_ancho = $request->input('ancho');
            $goBlue->medidas_cts_fondo = $request->input('fondo');
            $goBlue->medidas_cts_alto = $request->input('alto');
            $goBlue->necesita_aviso = $request->input('aviso');
            $goBlue->necesita_lona = $request->input('lona');
            $goBlue->necesita_caja_luz = $request->input('luz');
            $goBlue->necesita_bastidor = $request->input('bastidor');
            $goBlue->necesita_toldo_fachada_exterior = $request->input('toldo');
            $goBlue->necesita_pintura_exterior = $request->input('pintura_ext');
            $goBlue->necesita_pintura_interior = $request->input('pintura_int');
            $goBlue->necesita_vinilo = $request->input('vinilo');
            $goBlue->estado_solicitud = $request->input('estado');
            $goBlue->ruta_imagen1 = $ruta_imagen1;
            $goBlue->ruta_imagen2 = $ruta_imagen2;
            $goBlue->ruta_imagen3 = $ruta_imagen3;

            $dms = Dms::where('idpdv',$request->input('idpdv'))->firstOrFail();

            $goBlue->supervisor = $dms->NOMBRE_SUPERVISOR;
            $goBlue->sucursal_dealer = $dms->DISTRIBUIDOR;
            $goBlue->zona = $dms->CIUDAD;
            $goBlue->nombre_punto = $dms->nombre_punto;
            $goBlue->estado = $dms->ESTADO;
            $goBlue->circuito = $dms->circuito;

            $goBlue->save();

            return redirect()->back()->with('mensajeExito', 'Se Guardo correctamente');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al guardar');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        if ($request->ajax()){
            $goblue = Goblue::where('idpdv',$id)->firstOrFail();

            return response()->json($goblue);
        }

        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
