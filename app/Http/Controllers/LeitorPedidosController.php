<?php

namespace App\Http\Controllers;

include 'vendor/autoload.php';



$parser = new \Smalot\Pdfparser\Parser();


class LeitorPedidos extends Controller
{

 

public function recebe ($parser){

    //recebe os arquivos
   $pdf =  $parser->parsefile('/**.pdf');
   //verifica o tipo e tamanho do arquivo
   $pdf->validate([
    'file' => 'required|mimes:pdf|max:2048'
    ]);
        
        


}
public function read ($pdf){

    // le os arquivos 

    $details  = $pdf->getDetails();
    foreach ($details as $property => $value){
        if (is_array($value)){
            $value = implode(', ', $value);
        }
        echo $property . ' => ' . $value . "\n";
    }  

}

public function separa(){

    //separa as informações do pdf e separa ela caso necessário 
    // se a venda começar com '200000' retira da lista princa e adiciona uma lista para inserção manual depois
    // verifica cep 
    // faixa de preço


}


}

