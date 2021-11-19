<?php

namespace App\Http\Controllers;


use App\Classes\Cargas\Cargas;

use Illuminate\View\Factory as View;

class CargasController extends Controller
{



    public function getCargas (){



        $listCargas = new Cargas();
        $listCargas = $listCargas->consultCargas();



        //recebeu array com cargas
        return view('cargas.cargas', ['cargas' => $listCargas]);
    }



    public function viewCargas($listCargas, View $view){

        //vai retornar para a view que chamou
        dd($listCargas);

    }



}
