<?php

namespace App\Http\Controllers;



use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


//$parser = new \Smalot\Pdfparser\Parser();


class LeitorPedidosController extends Controller
{

 
public function recebe (Request $request){

//$mydir = '../teste';
//$myfiles = scandir($mydir);


//print_r($myfiles);
      
    //funciona porem escolhe apenas um arquivo

    $nome = $request->file->getClientOriginalName('file');

    
    $arquivo = $request->file('file');
    


    $estado = $arquivo->isValid();//verifica estado do arquivo
    //dd($estado);
    if ($estado != 'true'){


        return view('erro');
       

    } else {

        $parser = new \Smalot\PdfParser\Parser();
        $arquivo = $parser->parseFile($arquivo);
        $text  = $arquivo->getText();
        

        $text = str_replace(' ', '', $text);
        
        $codigo = array();

        $codigo = Str::between($text, 'Venda#', 'del');

         Arr::set($pedidos, 'codigo', $codigo);


         
        return view('pedidos.primeiro', ['codigo' => $pedidos]);

    }


    
}
public function read (){


    // le os arquivos 

   

    //return view('pedidos.primeiro', ['pedidos' => $pedidos]);    
}

public function separa(){

    //separa as informações do pdf e separa ela caso necessário 
    // se a venda começar com '200000' retira da lista princa e adiciona uma lista para inserção manual depois
    // verifica cep 
    // faixa de preço


}


}

