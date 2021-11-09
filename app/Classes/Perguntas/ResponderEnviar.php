<?php

namespace App\Classes\Perguntas;

use Illuminate\Support\Facades\DB;

class ResponderEnviar
{

    public function enviar($pergunta_id){

        //consulta para localizar pergunta no banco de dados
        $pergunta = DB::table('tbpergunta')->where('id', $pergunta_id)->first();
        //dd($pergunta);
        $text = $pergunta->text;
        $resposta = $pergunta->resposta;
        session_start();
        if(isset($_SESSION['access_token'])){
            $token = $_SESSION['access_token'];
        }else{
            dd('tokem não encontrado');
        }
        //echo $text .'<br/>' . $resposta . '<br/>'. $token . '<br/><br/>';
        if ($resposta != NULL) {
            //'{question_id: QUESTION_ID,text:"Some text here..."}'
            $url = "https://api.mercadolibre.com/answers?access_token=" . $token;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array("question_id" => (string) $pergunta_id, "text" => $resposta)));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $result = curl_exec($ch);
            //echo 'Resposta do ML:' . '<br/><br/>';
            //print_r($result);
            curl_close($ch);
            // Apagar a pergunta
            DB::table('tbpergunta')->where('id', $pergunta_id)->delete();
            return 'Resposta enviada com sucesso -> ' . $resposta;
        } else {
            // Resposta não encontrada
            return 'Responda a pergunta primeiro antes de enviar';
        }


    }

}
