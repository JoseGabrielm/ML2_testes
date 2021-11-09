<?php

namespace App\Classes\Perguntas;

use Illuminate\Support\Facades\DB;

class ResponderApagar
{

    public function ApagarPerguntas(){

        //Apagar todas as perguntas
        DB::table('tbpergunta')->delete();
        return 'Perguntas apagadas com sucesso';

    }


    public function ExcluirPergunta($item_id_pergunta){

        //Excluir uma pergunta
        DB::table('tbpergunta')->where('item_id', $item_id_pergunta)->delete();

    }

}
