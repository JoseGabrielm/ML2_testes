<?php

namespace App\Classes\Cargas;

use App\Http\Controllers\CargasController;

use Illuminate\Support\Facades\DB;

class Cargas{

public function consultCargas(){

    $conn = DB::connection('mysql2');
    $cargas = $conn->table('tbcarga')
                    ->select(DB::raw('*'))
                    ->where('obs', '>','Thainá')
                    ->limit('10')
                    ->get();


return ($cargas);

}


public function formCargas(){





    }


public function addCarga($dataCad, $destinoCad , $obsCad, $transCad){
    //dd('chegou');




$conn = DB::connection('mysql2')->table('tbcarga')->insert([

    'idCarga' => 1,
    'destino' => $destinoCad,
    'data' => '2016/03/05',
    'obs' => $obsCad,
    'tbtransportadora_idTransportadora' => 1

]);
dd('casdastrou');


}




}

?>
