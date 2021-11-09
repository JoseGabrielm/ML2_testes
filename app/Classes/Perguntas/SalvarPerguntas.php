<?php

namespace App\Classes\Perguntas;

use Illuminate\Support\Facades\DB;

class SalvarPerguntas
{

    public function salvar($perguntas) {

        //INICIO FOR - PERCORRER AS PERGUNTAS E SALVAR NO BANCO DE DADOS
        //dd($perguntas);
         $cidade = "";
        $array = array();

          foreach($perguntas as $key=>$pergunta) {
            $codig = $pergunta['id'];
            $pergunt = $pergunta['text'];
            $produ = $pergunta['item_id'];
            $produt = substr($produ, 3);
            $status = "UNANSWERED";
            //echo $produ .'   -   ' . $pergunt . '<br /><br />';

            //consulta para localizar produto
            $query2 = DB::table('tbmedida')->where('item_id', $produt)->first();
            if (isset($query2)) {
                $produto = $query2->item_id;
            } else {
                $query2 = DB::table('tbmedida')->where('item_id', 978095305)->first();
                $produto = $query2->item_id;
            }
            //echo $produto .' --- ';
            //var_dump($query2->descricao);
            //echo '</br>';
            
            //INICIO LOCALIZAR CEP NA PERGUNTA
            $cep1 = "";
            $cep = "";
            $pergunta1 = str_replace('-', '', $pergunt);
            $pergunta2 = str_replace('.', '', $pergunta1);
            $pergunta3 = str_replace(',', '', $pergunta2);
            $pergunta4 = str_replace('_', '', $pergunta3);
            $pergunta = str_replace(' ', '', $pergunta4);
            preg_match_all('/[0-9]{8}/i', $pergunta, $cep1);
            if (empty($cep1[0][0])) {
                $cep = "";
                $cidade = "";
            } else {
                $cep = $cep1[0][0];
                //procura nome da cidade
                $url = "viacep.com.br/ws/$cep/json/";
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $retorno = curl_exec($curl);
                $lenr = strlen($retorno);
                //echo 'tamanho '. $lenr;
                if($lenr >= 20){
                $retorno2 = json_decode($retorno, false);
                //inicio salvar dados do correio no banco de dados
                if (!isset($retorno2->erro)) {
                    $cidade = $retorno2->localidade . '-' . $retorno2->uf . '-' . $retorno2->bairro;
                } else {
                    $cidade = "";
                }
                }
            }
            //FIM LOCALIZAR CEP NA PERGUNTA
            //
            // LOCALIZAR QUANTIDADE NA PERGUNTA
            if ($pergunt != "") {
                $quantidade = new Quantidade();
                $quantAchada = $quantidade->LocalizarQuantidade($pergunt);

                //INICIO SALVAR NO BANCO DE
                $cidade2 = preg_replace("/'/", ' ', $cidade);
                $perguntand = preg_replace("/'/", ' ', $pergunt);
                $truncarTexto = new TruncarTexto();
                $perguntando = $truncarTexto->truncar($perguntand, 190);
                //echo $perguntando;
                $sql = "INSERT INTO tbpergunta (id, item_id, text, status, cep , quant, resposta, cidade) "
                        . "VALUES ('$codig', '$produto', '$perguntando', '$status', '$cep', $quantAchada, '', '$cidade2')";
                //echo 'sql: ' . $sql;
                $cadastro = DB::table('tbpergunta')->where('id', $codig)->first();
                if (!isset($cadastro->id) ) {
                    DB::update($sql);
                    array_push($array, $produ . ' - ' . $perguntando);
                }

            }
            //FIM SALVAR NO BANCO DE DADOS


        }  // FIM FOR - PERCORRER AS PERGUNTAS E SALVAR NO BANCO DE DADOS

        //var_dump($array);
        //die;
        return $array;
    }





}


