<?php

namespace App\Classes\Perguntas;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;


class ImportarPerguntas
{

    public function perguntas(){

        //importação perguntas mercadolivre
        //echo '<h3>IMPORTAÇÃO DE PERGUNTAS DO MERCADO LIVRE</h3>';
        $status = "unanswered";   //"ANSWERED" "UNANSWERED"
        $SELLER_ID = 193139959;
        session_start();
        if(isset($_SESSION['access_token'])){
            $token = $_SESSION['access_token'];
            //echo 'token IP: ' .$_SESSION['access_token']. '<br />';
        }else{
            dd('tokem não encontrado');
        }
        $token = $_SESSION['access_token'];
         //curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/questions/search?seller_id=$SELLER_ID&api_version=4
         //curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/questions/search?seller_id=419059118&api_version=4
                                                             
        $response = Http::withToken($token)->withHeaders(['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'])
                          ->get('https://api.mercadolibre.com/questions/search', [
                                'seller_id' => $SELLER_ID,
                                'status' => 'unanswered',
                                'api_version' => 4
                            ]);
        //dd($response->json());
        //dd($response->json(['questions']));
        //var_dump($response->json(['questions'])[0]);
        //dd($response->json(['questions'])[0]);
        //dd($response->json(['questions'])[0]['text']);
        $perguntas = $response->json(['questions']);
        //$tamanho = count($perguntas);
        //for($i = 1; $i < $tamanho; $i++){
        //    var_dump($perguntas[$i]['text']);
        //}
        //foreach($perguntas as $key=>$pergunta)
        //{
         //   var_dump($pergunta['text']);
        //} 
        //die;
        

                return $perguntas;
        }
    }


