<?php

namespace App\Http\Controllers;


use App\Classes\Cargas\Cargas;
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


        $formCad = $request -> input('dataCad');
        $formCad = $request -> input('destinoCad');
        $formCad = $request -> input('obsCad');
        $formCad = $request -> input('transpCad');

        dd($formCad);

        if ($formCad === null){

            dd('erro');

        }else{

            dd($formCad);


        }




    }





}
