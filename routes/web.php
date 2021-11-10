<?php


use App\Http\Livewire\Counter;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TokenController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PerguntasController;
use App\Http\Controllers\LeitorPedidosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Grupo de rotas protegidas
Route::middleware(['auth'])->group(function () {

    // Rotas para geração do token
    Route::get('/token', [TokenController::class, 'token'])->name('token');
    Route::get('/token/ok', [TokenController::class, 'ok'])->name('token.ok');
    Route::get('/token/erro', [TokenController::class, 'erro'])->name('token.erro');
    Route::get('/token/code', [TokenController::class, 'code'])->name('token.code');

    // Rotas para perguntas
    Route::get('/perguntas', [PerguntasController::class, 'index'])->name('perguntas');
    Route::get('/perguntas/importar', [PerguntasController::class, 'importar'])->name('perguntas.importar');
    Route::get('/perguntas/responder', [PerguntasController::class, 'responder'])->name('perguntas.responder');

    // Rotas para responder perguntas
    Route::get('/responder/fretado', [PerguntasController::class, 'fretado'])->name('responder.fretado');
    Route::get('/responder/gerar', [PerguntasController::class, 'gerar'])->name('responder.gerar');
    Route::get('/responder/enviar', [PerguntasController::class, 'enviar'])->name('responder.enviar');
    Route::get('/responder/limpar', [PerguntasController::class, 'limpar'])->name('responder.limpar');
    Route::get('/responder/editar', [PerguntasController::class, 'editar'])->name('responder.editar');
    Route::get('/responder/tudo', [PerguntasController::class, 'tudo'])->name('responder.tudo');
    Route::get('/responder/excluir', [PerguntasController::class, 'excluir'])->name('responder.excluir');
    Route::put('/responder/update/{pergunta_id}', [PerguntasController::class, 'update'])->name('responder.update');

    //Rotas para importador de pedidos
    Route::get('/pedidos/primeiro', [PedidosController::class, 'primeiro'])->name('pedidos.primeiro');
    Route::get('/pedidos/excluir', [PedidosController::class, 'excluir'])->name('pedidos.excluir');
    Route::get('/pedidos/limpar', [PedidosController::class, 'limpar'])->name('pedidos.limpar');
    Route::get('/pedidos/importar', [PedidosController::class, 'importar'])->name('pedidos.importar');
    Route::put('/pedidos/incluir', [PedidosController::class, 'incluir'])->name('pedidos.incluir');

    Route::get('/celeste', [CelesteController::class, 'celeste'])->name('celeste.inicio');
    Route::get('/celeste/atualizar', [CelesteController::class, 'celeste'])->name('celeste.atualizar');
    Route::get('/celeste/novo', [CelesteController::class, 'celeste'])->name('celeste.novo');
    Route::get('/celeste/importarML', [CelesteController::class, 'celeste'])->name('celeste.importarML');
    Route::get('/celeste', [CelesteController::class, 'celeste'])->name('celeste.excluir');

    route::post('/ler' , [LeitorPedidosController::class, 'recebe'])->name('leitor.ler');


    
    // Teste contador
    Route::get('/contador', Counter::class);

});

