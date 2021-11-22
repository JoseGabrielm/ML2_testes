<?php

namespace App\Http\Controllers;


use App\Classes\Cargas\Cargas;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;



class CargasController extends Controller
{



    public function getCargas (){



        $listCargas = new Cargas();
        $listCargas = $listCargas->consultCargas();



        //recebeu array com cargas
        return view('cargas.cargas', ['cargas' => $listCargas]);
    }



    public function formCargas(){



        return view('cargas.formCarga');
    }





    public function newCargas(Request $request){


        $dataCad = $request -> input('dataCad');
        $destinoCad = $request -> input('destinoCad');
        $obsCad = $request -> input('obsCad');
        $transCad = $request -> input('transCad');

        //dd($dataCad);
              //dd('certo');
        $insert = new Cargas();
        $insert -> addCarga($dataCad, $destinoCad , $obsCad, $transCad);

    }





}
