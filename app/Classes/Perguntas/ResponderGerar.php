<?php

namespace App\Classes\Perguntas;

use Illuminate\Support\Facades\DB;

class ResponderGerar
{

    public function gerar($pergunta_id){

        //consulta para localizar pergunta no banco de dados
        $pergunta = DB::table('tbpergunta')->where('id', $pergunta_id)->first();
        //dd($pergunta);
        // Se uma pergunta for localizada
        if ($pergunta) {
            $quant = $pergunta->quant;
            //PAC
            $valor1 = $pergunta->valor1;
            if($quant != null && $valor1 != null){
                $forma1 = $pergunta->forma1;
                $valor1 = $valor1 * $quant;
                $prazo1 = $pergunta->prazo1;
                $domicilio1 = $pergunta->domicilio1;
            }else{
                $forma1 = "";
                $valor1 = 0;
                $prazo1 = 0;
                $domicilio1 = "";
            }
            //SEDEX
            $valor2 = $pergunta->valor2;
            if($quant != null && $valor2 != null){
                $forma2 = $pergunta->forma2;
                $valor2 = $valor2 * $quant;
                $prazo2 = $pergunta->prazo2;
                $domicilio2 = $pergunta->domicilio2;
            }else{
                $forma2 = "";
                $valor2 = 0;
                $prazo2 = 0;
                $domicilio2 = "";
            }
            //fretado ou Jadlog
            $valor3 = $pergunta->valor3;
            if($quant != null && $valor3 != null){
                $valor3 = $pergunta->valor3;
                $prazo3 = $pergunta->prazo3;
                $domicilio2 = $pergunta->domicilio2;
            }else{
                $valor3 = 0;
                $prazo3 = 0;
                $domicilio2 = "";
            }
            //gerar a resposta
            if (!(empty($forma1) and ( empty($forma2)) and ( empty($prazo3)))) {
                $resposta0 = "Ola. ";
                //resposta correio pac
                if ($prazo1 > 5 && empty($prazo3)) {
                    //      $resposta1 = "O valor do envio de $quant pç pelos correios via $forma1 com prazo de "
                    //              . "entrega de $prazo1 dias úteis após o envio é R$ $valor1. $domicilio1 ";
                } else {
                    $resposta1 = "";
                }
                //resposta correio sedex
                if ($prazo2 > 2 && empty($prazo3)) {
                    //    $resposta2 = " O valor do envio de $quant pç pelos correios via $forma2 com prazo de "
                    //           . "entrega de $prazo2 dias úteis após o envio é R$ $valor2, $domicilio2 ";
                } else {
                    $resposta2 = "";
                }
                //resposta via caminhão fretado ou JadLog
                if (!empty($prazo3)) {
                    $resposta3 = " O valor do envio de $quant pç via fretado com prazo de "
                            . "entrega de $prazo3 dias úteis é R$ " . number_format($valor3,2,",",".")
                            . ", " . $domicilio2;
                } else {
                    $resposta3 = " Caso prefira, poderá retirar pessoalmente ou contratar uma transportadora de sua preferência. ";
                }
                $resposta4 = "  Agradeço seu contato.";

                $resposta = $resposta0 . $resposta1 . $resposta2 . $resposta3 . $resposta4;
                //echo $resposta . '<br />';
            } else {
                $resposta = " Infelizmente, no momento não temos rota para sua cidade. Caso tenha como"
                        . " contratar uma transportadora ou retirar, será um prazer tê-lo como nosso cliente. Obrigado.";
                //echo $resposta;
            }
            //salvar a resposta no banco de dados
            //$data2 = array(
                //'resposta' => $resposta,
            //);
            //$this->db->where('id', $id);
            //$this->db->update('tbpergunta', $data2);
            $cadastro = DB::table('tbpergunta')
            ->where('id', $pergunta_id)
            ->update(['resposta' =>$resposta]);



        } else {
            //echo 'pergunta não encontrada';
            $retorno = (object) array("resposta"=>'erro');
            return $retorno;
        }
        // gerar array
        $retorno = (object) array("resposta"=>$resposta);
        return $retorno;

    }

}
