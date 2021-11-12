<?php 
namespace App\Classes\LerPdf;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;





class LerPdf {


public function recebe (Request $request){

    $nome = $request->file->getClientOriginalName('file');
    //dd($nome);
    $arquivo = $request->file('file');
    $estado = $arquivo->isValid();//verifica estado do arquivo
    //dd($estado);
    if ($estado != 'true'){

        return view('erroPdf');

    } else {

        $parser = new \Smalot\PdfParser\Parser();
        $arquivo = $parser->parseFile($arquivo);
        
        $text  = $arquivo->getText();

        if ($text === "") {
            
    
            //return view 'erro'
        }
        
        $codigos = array();
        //trata os dados 
        $text = str_replace(' ', '', $text);

        //busca código
        $codigo = Str::between($text, 'Venda#', 'del');
        
        //adiciona código ao array
         Arr::set($codigos, 'codigo', $codigo);

        //dd($codigos);
         
        //retorna array para pedidos incluir
        return $codigo;


    }


    
}


}