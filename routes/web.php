<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middleware\AutenticacaoMiddleware;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/flowers/create', [ShowFlowers::class, 'create']);
// OU
// Route::get('/contato', 'ContatoController@contato');

// MIDDLEWARE
// Route::get('/', [PrincipalController::class, 'principal'])->name('site.index')->middleware(LogAcessoMiddleware::class);
// OU ASSIM
// Route::middleware(LogAcessoMiddleware::class)->get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');


// O ERRO É OPCIONAL
Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');

Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');


Route::middleware(AutenticacaoMiddleware::class)->prefix('/app')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente')->middleware(AutenticacaoMiddleware::class);
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar',[FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');


    Route::get('/fornecedor/editar/{id}/{msgSuccess?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');

    
    Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
