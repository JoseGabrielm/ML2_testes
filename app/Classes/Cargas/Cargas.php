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
                    ->limit('30')
                    ->get();


return ($cargas);

}


public function formCargas(){




    return view('cargas.form');
    }







public function addCarga(){

$conn = DB::connection('mysql2');
$cargas = $conn->insert('');





}




}

?>
