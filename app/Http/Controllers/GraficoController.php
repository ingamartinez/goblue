<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $estados = DB::table('tabla_goblue')
            ->select('estado_solicitud',DB::raw('count(*) as numero'))
            ->groupBy('estado_solicitud')
            ->get();

        $estadosGoBlue = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 200, 'height' => 200])
            ->labels(array_pluck($estados,'estado_solicitud'))
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'],
                    'data' => array_pluck($estados,'numero')
                ]
            ])
            ->optionsRaw("{
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Estados Go Blue'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }"
            );


//        $resSup= DB::table('log')
//            ->select(DB::raw('Count(log.id) as numero'),'for_users.nombre_sup','log.tipo')
//            ->join('for_users', 'log.for_users_id', '=', 'for_users.id')
//            ->groupBy('log.for_users_id','for_users.nombre_sup','log.tipo')
//            ->get();
//
//        dd($resSup);
//
//        $resumenSupervisor = app()->chartjs
//            ->name('barChartTest')
//            ->type('bar')
//            ->size(['width' => 200, 'height' => 200])
//            ->labels(['Fidel', 'Juan'])
//            ->datasets([
//                [
//                    "label" => "Creacion",
//                    'backgroundColor' => ['#FFCE56', '#FFCE56'],
//                    'data' => [69, 59]
//                ],
//                [
//                    "label" => "Modificacion",
//                    'backgroundColor' => ['#4BC0C0', '#4BC0C0'],
//                    'data' => [65, 12]
//                ]
//            ])
//            ->optionsRaw("{
//                responsive: true,
//                legend: {
//                    position: 'top',
//                },
//                title: {
//                    display: true,
//                    text: 'Estados Go Blue'
//                },
//                animation: {
//                    animateScale: true,
//                    animateRotate: true
//                }
//            }"
//            );



        return view('reportes.graficos',compact('estadosGoBlue'));
    }



}
