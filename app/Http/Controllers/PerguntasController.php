<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Classes\Perguntas\ImportarPerguntas;
use App\Classes\Perguntas\ResponderEnviar;
use App\Classes\Perguntas\SalvarPerguntas;
use App\Classes\Perguntas\ResponderFretado;
use App\Classes\Perguntas\ResponderGerar;
use App\Classes\Perguntas\ResponderApagar;

use App\Models\Tbpergunta;
use App\Models\Tbmedida;

class PerguntasController extends Controller
{

    private $tbpergunta;
    //private $tbmedida;
    public function __construct(Tbpergunta $tbpergunta, Tbmedida $tbmedida )
	{
        $this->tbpergunta = $tbpergunta;
        $this->tbmedida = $tbmedida;
    }


    public function index()
    {
        return view('perguntas.index');
    }



    public function importar()
    {
        //importação perguntas mercadolivre
        $importarPerguntas = new ImportarPerguntas();
        $perguntasImportadas = $importarPerguntas->perguntas();
        // salvar perguntas no banco de dados
        if($perguntasImportadas != ""){
            $salvarPerguntas = new SalvarPerguntas();
            $perguntasSalvas = $salvarPerguntas->salvar($perguntasImportadas);
        }else{
            $retornoEnviar = 'Tokem não gerado ou pergunta não encontrada';
            return view('perguntas.responder_enviar', ['retornoEnviar' => $retornoEnviar]);
        }
        //SE TUDO DER CERTO
        //echo 'quantidade de perguntas:' . count($perguntas->questions) . '<br /><br />';
        //print_r ($salvo);
       return view('perguntas.importar', ['perguntas' => $perguntasSalvas, 'quantidade'=> count($perguntasImportadas)]);
    }


    public function responder()
    {
        $perguntas = $this->tbpergunta->orderBy('item_id')->get();
        //dd($perguntas);
	    return view('perguntas.responder', ['perguntas' => $perguntas]);
    }


    public function fretado(Request $request)
    {
        //dd($request);
        $respostaFretado = new ResponderFretado();
        $retornoFretado = $respostaFretado->fretado($request->item_id, $request->pergunta_id);
        //dd($retornoFretado);
        return view('perguntas.responder_fretado', ['retorno_fretado' => $retornoFretado]);
    }


    public function gerar(Request $request)
    {
        //dd($request->id);
        $respostaGerar = new ResponderGerar();
        $retornoGerar = $respostaGerar->gerar($request->pergunta_id);
        //dd($retornoGerar);
        return view('perguntas.responder_gerar', ['retorno_gerar' => $retornoGerar]);
    }


    public function enviar(Request $request)
    {
        //dd($request);
        $respostaEnviar = new ResponderEnviar();
        $retornoEnviar = $respostaEnviar->enviar($request->pergunta_id);
        //dd($retornoEnviar);
            return view('perguntas.responder_enviar', ['retornoEnviar' => $retornoEnviar]);
    }


    public function limpar()
    {
        $respostaLimpar = new ResponderApagar();
        $retornoEnviar = $respostaLimpar->ApagarPerguntas();
        return view('dashboard');
    }


    public function editar(Request $request)
    {
        //dd($request);
        //consulta para localizar pergunta no banco de dados
        $pergunta = DB::table('tbpergunta')->where('id', $request->pergunta_id)->first();
        //dd($pergunta);
        return view('perguntas.responder_editar', ['pergunta' => $pergunta]);
    }


    public function update(Request $request)
    {
        //dd($request);
        //consulta para atualizar pergunta no banco de dados
        $request->cep == null ? $cep = '' : $cep = $request->cep ;
        $request->resposta == null ? $resposta = '' : $resposta = $request->resposta ;
        $request->cidade == null ? $cidade = '' : $cidade = $request->cidade ;
        $pergunta = DB::table('tbpergunta')->where('id', $request->pergunta_id)
            ->update(['cep' => $cep, 'quant' => $request->quant, 'cidade' => $cidade, 'resposta' => $resposta]);
        //dd($pergunta);
        $perguntas = $this->tbpergunta->all();
        //dd($perguntas);
	    return view('perguntas.responder', ['perguntas' => $perguntas]);
    }


    public function tudo(Request $request)
    {
        //dd($request);
        $pergunta_id = $request->pergunta_id;
        $pergunta = DB::table('tbpergunta')->where('id', $request->pergunta_id)->first();
        //dd($pergunta->item_id);
        if($pergunta->cep != null){
            $item_id = $pergunta->item_id;
            //dd($item_id . ' - ' . $pergunta_id);
            $respostaFretado = new ResponderFretado();
            $retornoFretado = $respostaFretado->fretado($item_id, $pergunta_id );
            //dd($retornoFretado);

            $respostaGerar = new ResponderGerar();
            $retornoGerar = $respostaGerar->gerar($pergunta_id);
            //dd($retornoGerar);

            $respostaEnviar = new ResponderEnviar();
            $retornoEnviar = $respostaEnviar->enviar($pergunta_id);
            //dd($retornoEnviar);
            return view('perguntas.responder_enviar', ['retornoEnviar' => $retornoEnviar]);
        }else{
            $retornoEnviar = 'CEP inválido';
            return view('perguntas.responder_enviar', ['retornoEnviar' => $retornoEnviar]);
        }
    }


    public function excluir(Request $request)
    {
        //dd($request);
        DB::table('tbpergunta')->where('id', $request->pergunta_id)->delete();
        $perguntas = $this->tbpergunta->all();
	    return view('perguntas.responder', ['perguntas' => $perguntas]);
    }







}
