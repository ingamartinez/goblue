<?php

namespace App\Http\Controllers;

use App\Dms;
use App\Goblue;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Mockery\Exception;

class GoBlueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goBlues=Goblue::all();

        return view('goblue.index', compact('goBlues'));
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

            $goBlue = new Goblue();

            $dms = Dms::where('idpdv',$request->input('idpdv'))->firstOrFail();

            $goBlue->supervisor = $dms->NOMBRE_SUPERVISOR;
            $goBlue->sucursal_dealer = $dms->DISTRIBUIDOR;
            $goBlue->zona = $dms->CIUDAD;
            $goBlue->nombre_punto = $dms->nombre_punto;
            $goBlue->estado = $dms->ESTADO;
            $goBlue->circuito = $dms->circuito;

            $ruta=$request->input('idpdv').'_fachada_'.$dms->nombre_punto.'.jpg';
            Image::make($request->file('img_fachada'))->save('imagenes/'.$ruta);
            Image::make($request->file('img_fachada'))->resize(100, 50)->save('imagenes/min/'.$ruta);
            $goBlue->ruta_imagen1 = $ruta;

            $ruta=$request->input('idpdv').'_interior_'.$dms->nombre_punto.'.jpg';
            Image::make($request->file('img_interna'))->save('imagenes/'.$ruta);
            Image::make($request->file('img_interna'))->resize(100, 50)->save('imagenes/min/'.$ruta);
            $goBlue->ruta_imagen2 = $ruta;

            $ruta=$request->input('idpdv').'_panoramica_'.$dms->nombre_punto.'.jpg';
            Image::make($request->file('img_panoramica'))->save('imagenes/'.$ruta);
            Image::make($request->file('img_panoramica'))->resize(100, 50)->save('imagenes/min/'.$ruta);
            $goBlue->ruta_imagen3 = $ruta;

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



            $goBlue->save();

            $this->registerLog(Auth::user()->id,$goBlue->id,"Creación");


            return redirect()->back()->with('mensajeExito', 'Se Guardo correctamente');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al guardar - '.$ex->getMessage());
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
        $goBlue = Goblue::findOrFail($id);
        $dms=Dms::where('idpdv',$goBlue->idpdv)->firstOrfail();

        return view('goblue.edit',compact('goBlue','dms','id'));
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
        try{
            $goBlue = Goblue::findOrFail($id);

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

            $dms = Dms::where('idpdv',$request->input('idpdv'))->firstOrFail();

            $goBlue->supervisor = $dms->NOMBRE_SUPERVISOR;
            $goBlue->sucursal_dealer = $dms->DISTRIBUIDOR;
            $goBlue->zona = $dms->CIUDAD;
            $goBlue->nombre_punto = $dms->nombre_punto;
            $goBlue->estado = $dms->ESTADO;
            $goBlue->circuito = $dms->circuito;

            if ($request->hasFile('img_fachada')) {
                $ruta=$request->input('idpdv').'_fachada_'.$dms->nombre_punto.'.jpg';

                Image::make($request->file('img_fachada'))->save('imagenes/'.$ruta);
                Image::make($request->file('img_fachada'))->resize(100, 50)->save('imagenes/min/'.$ruta);

                $goBlue->ruta_imagen1 = $ruta;
            }

            if ($request->hasFile('img_interna')) {
                $ruta=$request->input('idpdv').'_interior_'.$dms->nombre_punto.'.jpg';

                Image::make($request->file('img_interna'))->save('imagenes/'.$ruta);
                Image::make($request->file('img_interna'))->resize(100, 50)->save('imagenes/min/'.$ruta);

                $goBlue->ruta_imagen2 = $ruta;
            }

            if ($request->hasFile('img_panoramica')) {
                $ruta=$request->input('idpdv').'_panoramica_'.$dms->nombre_punto.'.jpg';

                Image::make($request->file('img_panoramica'))->save('imagenes/'.$ruta);
                Image::make($request->file('img_panoramica'))->resize(100, 50)->save('imagenes/min/'.$ruta);

                $goBlue->ruta_imagen3 = $ruta;
            }

            $goBlue->save();

            $this->registerLog(Auth::user()->id,$goBlue->id,"Modificación");

            return redirect()->back()->with('mensajeExito', 'Se Actualizó correctamente');

        }catch (\Exception $ex){
            return redirect()->back()->with('mensaje', 'Error al guardar - '.$ex->getMessage());
        }

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

    /**
     * @param $id_user
     * @param $id_idpdv
     * @param $tipo
     * @return boolean
     */

    function registerLog($id_user, $id_idpdv, $tipo)
    {
        try{
            $log = new Log();
            $log->for_users_id=$id_user;
            $log->tabla_goblue_id=$id_idpdv;
            $log->tipo=$tipo;

            $log->save();

            echo $log;

            return true;
        }catch (\Exception $ex){
            return false;
        }

    }
}
