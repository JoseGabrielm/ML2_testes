<?php

namespace App\Classes\Perguntas;

use Illuminate\Support\Facades\DB;

class ResponderFretado
{

    public function Fretado($item_id, $pergunta_id)
    {
        // Calcula entrega via caminhão fretado e JadLog

        // consulta para localizar pergunta e produto-tbmedida no banco de dados
        $produto = DB::table('tbmedida')->where('item_id', $item_id)->first();
        //dd($produto);
        $pergunta = DB::table('tbpergunta')->where('id', $pergunta_id)->first();
        //dd($pergunta);

        // Se localizar uma pergunta no banco de dados e o cep não for null
        if ($pergunta && $pergunta->cep != NULL) {
            //pega e formata o cep
            $cep  = $pergunta->cep;
            $ar = array("-", ".", " ");
            $cep = str_replace($ar, "", $cep);
            //echo 'CEP: ' . $cep . '<br /><br />';
            // Dados dos produtos
            $pesoUnitario = $produto->peso;
            $quantidade = $pergunta->quant;
            $pesoTotal = $pesoUnitario * $quantidade;
            //echo 'Produto: ' . $produto->descricao . '<br />' . 'Pergunta: ' . $pergunta->text .  '<br />';
            //echo 'PesoUnitario: ' . $pesoUnitario . '<br />' . 'Quantidade: ' . $quantidade . '<br /><br />';

            $valorFretado = 0;
            $valorJadlog = 0;
            $mensagemQuantidade = "";
            $entregaFretado = "";
            $entregaJadlog = "";
            $pesoParcial = 0.0;
            if ($pesoUnitario >= 30) {
                // Se o peso do produto for maior que 30 é um armario
                //echo '----- ARMARIO ------' . '<br />';
                $frete = DB::table('tbfrete')->where('cepini', '<=', $cep)
                    ->where('cepfim', '>=',  $cep)
                    ->where('pesoini', '<=',  $pesoTotal)
                    ->where('pesofim', '>=',  $pesoTotal)
                    ->first();
                //dd($frete);
                if ($frete) {
                    // Se localizar um cep e peso é porque entrega via fretado
                    $valorFretado = $frete->valor;
                    $prazoFretado = $frete->prazo;
                    $regiaoFretado = $frete->regiao;
                    $entregaFretado = "Entregamos este armario por caminhão fretado";
                    $entregaJadlog = "";
                    $mensagemQuantidade = "";
                    // então salvamos no banco de dados
                    //$sql = "INSERT INTO tbpergunta (valor3, prazo3, quant, domicilio2) "
                    //. "VALUES ($valorFretado, $prazoFretado, $quantidade, $mensagemQuantidade)";
                    //dd( 'sql: ' . $sql . '<br /><br />');
                    //DB::update($sql);
                    $cadastro = DB::table('tbpergunta')
                        ->where('id', $pergunta_id)
                        ->update([
                            'valor3' => $valorFretado, 'prazo3' => $prazoFretado,
                            'quant' => $quantidade, 'domicilio2' => $mensagemQuantidade
                        ]);
                    //echo  'Entrega via Fretada ' . $regiaoFretado . '<br />' . $valorFretado . '<br />' . $prazoFretado . '<br /><br />';
                } else {
                    // Se não for localizado cep é porque não entregamos via fretado
                    $entregaFretado = "Não entregamos este armario com caminhão fretado";
                }
                //echo $entregaFretado . '<br /><br />';
            } else {
                //Se o peso do produto for menor que 30 é estante
                $frete = DB::table('tbfrete')->where('cepini', '<=', $cep)
                    ->where('cepfim', '>=',  $cep)
                    ->where('pesoini', '<=',  $pesoTotal)
                    ->where('pesofim', '>=',  $pesoTotal)
                    ->first();
                //dd($frete);
                // Calcula para fretado
                if ($frete && $pesoTotal >= 30) {
                    // Se localizar um cep e peso
                    $valorFretado = $frete->valor;
                    $prazoFretado = $frete->prazo;
                    $regiaoFretado = $frete->regiao;
                    $entregaFretado = "Entregamos esta estante por caminhão fretado";
                    //echo 'Fretado: ' . $regiaoFretado . '<br />' . $valorFretado . '<br />' . $prazoFretado;
                } else {
                    $entregaFretado = "Não entregamos esta estante com caminhão fretado";
                }
                //echo $entregaFretado . '<br /> <br />';
                // Calcula para jadilog
                $quantParcial = $quantidade;
                if ($pesoTotal > 30) {
                    if ($pesoUnitario > 7.5 && $pesoUnitario <= 8.9) {
                        // Se o peso for entre 7 e 8,9 kg é estante 25
                        $quantParcial = 3;
                    }
                    if ($pesoUnitario > 8.9 && $pesoUnitario <= 15) {
                        // Se o peso for entre 9 e 15 kg é estante 30
                        $quantParcial = 2;
                    }
                    if ($pesoUnitario > 15 && $pesoUnitario <= 30) {
                        // Se o peso for entre 15 e 30 kg é estante 40 ou maior
                        $quantParcial = 1;
                    }
                    if ($quantParcial == $quantidade) {
                        $pesoParcial = $pesoUnitario * $quantidade;
                        $mensagemQuantidade = "";
                    } else {
                        $pesoParcial = $pesoUnitario * $quantParcial;
                        $mensagemQuantidade = "Caso tenha interesse faça varias compras de até " . $quantParcial . " peças.";
                        //$quantidade = $quantParcial;
                    }
                } else {
                    $quantParcial = $quantidade;
                    $pesoParcial = $pesoUnitario * $quantidade;
                }
                //echo 'quantParcial ' . $quantParcial . '<br />' . 'PesoTotal: ' . $pesoTotal . '<br /><br />';
                $fretejadlog = DB::table('tbfrete')->where('cepini', '<=', $cep)
                    ->where('cepfim', '>=',  $cep)
                    ->where('pesoini', '<=',  $pesoParcial)
                    ->where('pesofim', '>=',  $pesoParcial)
                    ->first();
                //dd($fretejadlog);
                // Se localizar um ou mais cep e peso
                if ($fretejadlog && $pesoParcial < 30) {
                    $valorJadlog = $fretejadlog->valor;
                    $prazoJadlog = $fretejadlog->prazo;
                    $regiaoJadlog = $fretejadlog->regiao;
                    $entregaJadlog = "Entregamos esta estante pela jadlog";
                    // Calcular total de peças para jadilog
                    $valorJadlogTotal = $valorJadlog / $quantParcial * $quantidade;
                    //echo 'Jadlog: ' . $regiaoJadlog . '<br />'  . 'peso: ' .$valorJadlog . '<br />' . 'prazo: ' .$prazoJadlog . '<br /><br />';
                } else {
                    $entregaJadlog = "Não entregamos esta estante pela jadlog";
                }
                //echo $entregaJadlog . '<br />';
            }

            if (
                $entregaFretado == "Entregamos esta estante por caminhão fretado" &&
                $entregaJadlog == "Não entregamos esta estante pela jadlog"
            ) {
                // Se entregamos apenas por fretado salvar em tbperguntas que entregamos via fretado
                $mensagemQuantidade = "";
                $cadastro = DB::table('tbpergunta')
                    ->where('', $pergunta_id)
                    ->update([
                        'valor3' => $valorFretado, 'prazo3' => $prazoFretado,
                        'quant' => $quantidade, 'domicilio2' => $mensagemQuantidade
                    ]);
            }

            if (
                $entregaFretado == "Não entregamos esta estante com caminhão fretado" &&
                $entregaJadlog == "Entregamos esta estante pela jadlog"
            ) {
                // Se entregamos apenas por jadlog salvar em tbperguntas que entregamos via jadlog
                $cadastro = DB::table('tbpergunta')
                    ->where('id', $pergunta_id)
                    ->update([
                        'valor3' => $valorJadlog, 'prazo3' => $prazoJadlog,
                        'quant' => $quantParcial, 'domicilio2' => $mensagemQuantidade
                    ]);
            }

            if (
                $entregaFretado == "Entregamos esta estante por caminhão fretado" &&
                $entregaJadlog == "Entregamos esta estante pela jadlog"
            ) {
                // Se entregamos nos dois vamos verificar o de menor valor
                if ($valorFretado < $valorJadlogTotal) {
                    // Se o valor do fretado for menor entregamos via fretado
                    $mensagemQuantidade = "";
                    $cadastro = DB::table('tbpergunta')
                        ->where('id', $pergunta_id)
                        ->update([
                            'valor3' => $valorFretado, 'prazo3' => $prazoFretado,
                            'quant' => $quantidade, 'domicilio2' => $mensagemQuantidade
                        ]);
                } else {
                    // Se o valor da jadlog for menor entregamos via jadlog
                    $cadastro = DB::table('tbpergunta')
                        ->where('id', $pergunta_id)
                        ->update([
                            'valor3' => $valorJadlog, 'prazo3' => $prazoJadlog,
                            'quant' => $quantParcial, 'domicilio2' => $mensagemQuantidade
                        ]);
                }
            }
        } else {
            // Se nenhuma pergunta ou cep for encontrado
            //echo "Nenhuma pergunta ou CEP encontrado" . '<br /><br />';
            $retorno = (object) array("cep" => 'erro');
            return $retorno;
        }
        // gerar array
        $retorno = (object) array(
            "cep" => $cep, "peso_unitario" => $pesoUnitario,
            "quant" => $quantidade, "peso_total" => $pesoTotal,
            "fretado" => $entregaFretado, "jadlog" => $entregaJadlog,
            "pergunta" => $pergunta->text, "jadlogValor" => $valorJadlog,
            "fretadoValor" => $valorFretado
        );
        return $retorno;
    }
}
