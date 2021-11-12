<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Tbimport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Classes\Pedidos\ImportarPedidos;


class PedidosController extends Controller
{

    private $tbimport;
    public function __construct(Tbimport $tbimport )
	{
        $this->tbimport = $tbimport;
    }


    public function primeiro()
    {
        $usuario = Auth::user()->name;
        $pedidos = $this->tbimport->where('usuario', $usuario)->orderby('id', 'desc')->get();
        //dd($pedidos);
	    return view('pedidos.primeiro', ['pedidos' => $pedidos]);
    }


    public function excluir(Request $request)
    {
        //dd($request->pedido_id);
        DB::table('tbimport')->where('id', $request->pedido_id)->delete();
        $usuario = Auth::user()->name;
        $pedidos = $this->tbimport->where('usuario', $usuario)->get();
	    return view('pedidos.primeiro', ['pedidos' => $pedidos]);
    }


    public function incluir(Request $request)
    {
        
        
        $codigo = $request->codigo;
        $usuario = Auth::user()->name;
        DB::insert('insert into tbimport (pedido, usuario) values (?, ?)', [$codigo, $usuario]);
        $codigo = $this->tbimport->where('usuario', $usuario)->orderby('id', 'desc')->get();
        //dd($codigo);
	    return view('pedidos.primeiro', ['pedidos' => $codigo]);
    }


    public function limpar()
    {
        DB::table('tbimport')->delete();
        return view('dashboard');
    }


    public function importar(Request $request)
    {
        //dd($request->id);
        $importarPedidos = new ImportarPedidos();
        $retornoImportar = $importarPedidos->importar();
        dd($retornoImportar);
        //return view('perguntas.responder_gerar', ['retorno_gerar' => $retornoImportar]);
    }




}
