<?php

namespace App\Classes\Pedidos;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImportarPedidos
{


    public function importar() {

        //$ORDER_ID = $this->input->post("idped");
        $arquivo = "arquivoML";
        //$ACCESS_TOKEN = $this->session->userdata("token");
        session_start();
        if(isset($_SESSION['access_token'])){
            $token = $_SESSION['access_token'];
        }else{

            dd('token não encontrado');

        }
        $token = $_SESSION['access_token'];

        //Pegar pedidos do banco de dados tbimport
        //$array = DB::table('tbimport')->get()->toArray();
        //dd($array);
        $usuario = Auth::user()->name;
        $objeto = DB::table('tbimport')->where('usuario', $usuario)->get();
        //dd($objeto);

        //var_dump($array);
        //$object = new stdClass();
        //$objeto = (object) $array;
        $listaPedido = null;
        $errno = null;
        $errno2 = null;

        foreach ($objeto as $pedido) {
            //echo 'ped-->> ' . $pedido->pedido;
            $ORDER_ID = str_replace(" ", "", $pedido->pedido);
            $existe = false;
            //dd($pedido);
            //echo '<br />';


            //IMPORTAR O PEDIDO DO ML - ORDER
            //curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/orders/2032217210      
            //curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/orders/768570754                                                                          
            $response = Http::withToken($token)->get('https://api.mercadolibre.com/orders/' . $ORDER_ID);
            //dd($response->json());
            //var_dump($resposta);
            $importado = json_decode($response, FALSE);
            //echo $len;
            // Verifica se houve erros e exibe a mensagem de erro
            if ($response->failed()) {
                //erro
            } else {
                if (!$token) {
                    //echo '<br /><br />';
                   // echo("ERRO - Tokem não gerado ou pedido não encontrado");
                    $existe = true;
                    //echo '<br /><br />';
                    //var_dump($importado);
                    //echo '<br /><br />';
                } else {
                    //var_dump($importado);
                    //print_r($resposta);
                    $idPedidoML = $importado->id ?: "";
                    $total_amount = $importado->total_amount ?: 0;
                    $paid_amount = $importado->paid_amount ?: 0;
                    $title = $importado->order_items[0]->item->title ?: "";
                    $seller_sku = $importado->order_items[0]->item->seller_sku ?: 999999999;
                    if (property_exists($importado, "value_name")) {
                    $value_name = $importado->order_items[0]->item->variation_attributes[0]->value_name ?: "";
                    }else{
                        $value_name = "";
                        
                    }
                    $quantity = $importado->order_items[0]->quantity ?: 0;
                    $unit_price = $importado->order_items[0]->unit_price ?: 0;
                    $sale_fee = $importado->order_items[0]->sale_fee ?: 0;
                    $shipping = $importado->shipping->id ?: "inexistente";
                    $buyerid = $importado->buyer->id ?: "";
                    $nickname = $importado->buyer->nickname ?: "";
                    $email = $importado->buyer->email ?: "";
                    $first_name = "";
                    $last_name = "";
                    $area_code = $importado->buyer->phone->area_code ?: "";
                    $numberfone = $importado->buyer->phone->number ?: "";
                    $area_code2 = $importado->buyer->alternative_phone->area_code ?: "";
                    $numberfone2 = $importado->buyer->alternative_phone->number ?: "";

                }
            }

            //IMPORTAR COMPRADOR - BUYER
            //curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/orders/$ORDER_ID/billing_info
            $response3 = Http::withToken($token)->get('https://api.mercadolibre.com/orders/' . $ORDER_ID . '/billing_info');
            //dd($response3->json());
            //var_dump($resposta);
            $importado3 = json_decode($response3, FALSE);
            //var_dump($importado2);
            // Verifica se houve erros e exibe a mensagem de erro
            if ($response3->failed()) {
                //erro importação
            } else {              
                //print_r($resposta);
                if (!$token) {
                    //echo '<br /><br />';
                    //echo("ERRO - Tokem não gerado ou envio não encontrado");
                    //echo '<br /><br />';
                    //var_dump($importado2);
                } else {                   
                    //$city = $importado3->billing_info->additional_info[0]->value ?: "";
                    //$street_number = $importado3->billing_info->additional_info[1]->value ?: "";
                    //$site_id = $importado3->billing_info->additional_info[2]->value ?: "";
                    //$neighborhood = $importado3->billing_info->additional_info[3]->value ?: "";
            //$first_name = $importado3->billing_info->additional_info[4]->value ?: "";
                    //$$state = $importado3->billing_info->additional_info[5]->value ?: "";
            //$last_name = $importado3->billing_info->additional_info[6]->value ?: "";
                    //$street_name = $importado3->billing_info->additional_info[7]->value ?: "";
                    $doc_type = $importado3->billing_info->doc_type ?: "";                 
                    $doc_number = $importado3->billing_info->doc_number ?: "";
                    //$comment = $importado3->billing_info->additional_info[10]->value ?: "";
                    //$zip_code = $importado3->billing_info->additional_info[11]->value ?: "";
                    $tamanho = count($importado3->billing_info->additional_info);
                    //echo $tamanho;
                    //die;
                    if($doc_type == 'CPF'){
                        for ($i=0; $i < $tamanho; $i++) {
                            if($importado3->billing_info->additional_info[$i]->type == "FIRST_NAME" ){
                                $first_name = $importado3->billing_info->additional_info[$i]->value ?: "";    break;                   
                            }
                        }
                        for ($i=0; $i < $tamanho; $i++) {
                            if($importado3->billing_info->additional_info[$i]->type == "LAST_NAME" ){
                                $last_name = $importado3->billing_info->additional_info[$i]->value ?: "";      break;                 
                            }
                        }
                    }
                    
                    if($doc_type == 'CNPJ'){
                        for ($i=0; $i < $tamanho; $i++) {
                            if($importado3->billing_info->additional_info[$i]->type == 'BUSINESS_NAME' ){
                                $first_name = $importado3->billing_info->additional_info[$i]->value ?: ""; 
                                $last_name ="";                       
                            }
                            }
                        }
                        
                    //echo("first_name -- " . $first_name . " ");
                    //echo("last_name -- ". $last_name . "<br />");
                    //echo("doc_type -- " . $doc_type . "<br />");
                    //echo("doc_number -- " . $doc_number . "<br />");
                   //die;
                   
                }
            }

        


            //IMPORTAR ENTREGA - SHIPMENTS
            //echo '---------------------';
            //echo '<br /><br />';
            //curl -X GET -H 'Authorization: Bearer $ACCESS_TOKEN' https://api.mercadolibre.com/shipments/shipment_id
            $response2 = Http::withToken($token)->get('https://api.mercadolibre.com/shipments/' . $shipping);
            //dd($response->json());
            //var_dump($resposta);
            $importado2 = json_decode($response2, FALSE);
            //var_dump($importado2);
            // Verifica se houve erros e exibe a mensagem de erro
            if ($response->failed()) {
                //erro importação
            } else {              
                //print_r($resposta);
                if (!$token) {
                    //echo '<br /><br />';
                    //echo("ERRO - Tokem não gerado ou envio não encontrado");
                    //echo '<br /><br />';
                    //var_dump($importado2);
                } else {
                    $street_name = $importado2->receiver_address->street_name ?: "";
                    $street_number = $importado2->receiver_address->street_number ?: "";
                    $comment2 = $importado2->receiver_address->comment ?: "";
                    $comment = preg_replace('/[\x00-\x1F\x7F]/u', '-',  $comment2);
                    $zip_code = $importado2->receiver_address->zip_code ?: "";
                    $city = $importado2->receiver_address->city->name ?: "";
                    $state = $importado2->receiver_address->state->id ?: "";
                    $neighborhood = $importado2->receiver_address->neighborhood->name ?: "";
                    $receiver_name = $importado2->receiver_address->receiver_name ?: "";
                    $receiver_phone = $importado2->receiver_address->receiver_phone ?: "";
                    $cost = $importado2->shipping_option->cost ?: 0;
                    //echo("street_name -- " . $street_name . " - ");
                    //echo($street_number . "<br />");
                    //echo("comment -- " . $comment . "<br />");
                    //echo("zip_code -- " . $zip_code . "<br />");
                    //echo("city -- " . $city . " - ");
                    //echo($state . "<br />");
                    //echo("neighborhood -- " . $neighborhood . "<br />");
                    //echo("receiver_name -- " . $receiver_name . "<br />");
                    //echo("receiver_phone -- " . $receiver_phone . "<br />");
                    //echo("cost -- " . $cost . "<br />");
                }
            }

            

            //CSV - Criar arquivo - criando o array de valores a ser gravado
            $listaPedido[$idPedidoML]['idPedidoML'] = $idPedidoML;
            $listaPedido[$idPedidoML]['total_amount'] = $total_amount;
            $listaPedido[$idPedidoML]['paid_amount'] = $paid_amount;
            $listaPedido[$idPedidoML]['seller_sku'] = $seller_sku;
            $listaPedido[$idPedidoML]['title'] = $title;
            $listaPedido[$idPedidoML]['value_name'] = $value_name;
            $listaPedido[$idPedidoML]['quantity'] = $quantity;
            $listaPedido[$idPedidoML]['unit_price'] = $unit_price;
            $listaPedido[$idPedidoML]['sale_fee'] = $sale_fee;
            $listaPedido[$idPedidoML]['shipping'] = $shipping;
            $listaPedido[$idPedidoML]['buyerid'] = "";
            $listaPedido[$idPedidoML]['nickname'] = $nickname;
            $listaPedido[$idPedidoML]['email'] = $email;
            $listaPedido[$idPedidoML]['first_name'] = str_replace(";", " ", $first_name);
            $listaPedido[$idPedidoML]['last_name'] = str_replace(";", " ", $last_name);
            $listaPedido[$idPedidoML]['area_code'] = $area_code;
            $listaPedido[$idPedidoML]['numberfone'] = $numberfone;
            $listaPedido[$idPedidoML]['area_code2'] = $area_code2;
            $listaPedido[$idPedidoML]['numberfone2'] = $numberfone2;
            $listaPedido[$idPedidoML]['doc_type'] = $doc_type;
            $listaPedido[$idPedidoML]['doc_number'] = $doc_number;
            $listaPedido[$idPedidoML]['street_name'] = str_replace(";", " ", $street_name);
            $listaPedido[$idPedidoML]['street_number'] = $street_number;
            $listaPedido[$idPedidoML]['comment'] = str_replace(";", " ", $comment);
            $listaPedido[$idPedidoML]['zip_code'] = $zip_code;
            $listaPedido[$idPedidoML]['city'] = $city;
            $listaPedido[$idPedidoML]['state'] = $state;
            $listaPedido[$idPedidoML]['neighborhood'] = str_replace(";", " ", $neighborhood);
            $listaPedido[$idPedidoML]['receiver_name'] = str_replace(";", " ", $receiver_name);
            $listaPedido[$idPedidoML]['receiver_phone'] = str_replace(" ", "", $receiver_phone);
            $listaPedido[$idPedidoML]['cost'] = $cost;
            //echo("---Nome da Rua --- " . "<br />");
            //print_r($listaPedido[$idPedidoML]['street_name']) . "<br />";
            //print_r($listaPedido);
            //echo '-----------------------------------------------------------' . '<br />';
        }// foreach pedidos
        //print_r($listaPedido);
        //die;
        //Exportar arquivo para csv
        

        var_dump($listaPedido);
        
        
        
        $arquivo = "pedido";

        foreach ($listaPedido as $pedido) {

            
            
        }


        //inserir no banco de dados
        //e se já existir exibir marcação


       
        //file_put_contents($arquivo, $fp);

        // Enviando o CSV para download
        header('Content-type: text/csv; charset=UTF-8; header=present');
        header('Content-Disposition: attachment; filename="arquivo.csv"');
        readfile($arquivo);
    }



}