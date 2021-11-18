<?php

namespace App\Classes\Cargas;

use Illuminate\Support\Facades\DB;

class Cargas{

public function exibeCarga(){

    $conn = DB::connection('mysql2');
    $cargas = $conn->table('tbcarga')
                    ->select(DB::raw('*'))
                    ->where('obs', '>','Thainá')
                    ->limit('30')
                    ->get();


    return view('cargas/cargas',  ['cargas' => $cargas]);
}

}




?>
