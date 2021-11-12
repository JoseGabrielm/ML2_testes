<?php
//redirecionado para ca após receber o arquivo pdf


namespace App\Http\Controllers;

use Illuminate\Http\Request;
//$parser = new \Smalot\Pdfparser\Parser();
use App\Classes\LerPdf\LerPdf;

use App\Http\Controllers\PedidosController;

class LeitorPedidosController extends Controller
{

    public function PdfRecebe (Request $request){
    $recebePdf = new LerPdf(); //instancio a classe para LerPdf 
    $codPdf = $recebePdf->recebe($request); //passo o arquivo para a função recebe dentro de LerPdf
    

    if($codPdf === ""){return view('leitorPdf/erro');}

    var_dump($codPdf);

    return redirect()->action([PedidosController::class, 'incluir'], ['codigo' => $codPdf]);

    //chamo PedidosController 
    //e passo o array de pedidos
    //para a função incluir

}






}

