<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;


//$parser = new \Smalot\Pdfparser\Parser();


class LeitorPedidosController extends Controller
{

 

public function recebe (Request $request){

    $nome = $request->file->getClientOriginalName('file');

    $parser = new \Smalot\PdfParser\Parser();
    $nome = str_replace(' ', '' , $nome);

    //dd((asset("storage/") . "/" . $nome));
    $pdf = $parser->parseFile(asset("storage") . "/" . $nome);
    
    


    $text = $pdf->getText();

    echo $text;
      










    //funciona porem escolhe apenas um arquivo


    //$nome = $request->file->getClientOriginalName('file');
    //$arquivo = $request->file('file');
    
    //$estado = $arquivo->isValid(); //verifica estado do arquivo

    //if ($estado != 'true'){


        //echo "erro. Arquivo não é válido";
       

   // } else {

      //  $pedidos = null;

      //  return view('pedidos.primeiro', ['pedidos' => $pedidos]);

   // }


    
   






       
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

