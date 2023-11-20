<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrdemController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Rotas De Log e Deslog
Route::get('/', [Controller::class, 'index'])->name('login.form'); //Formulario de Login
Route::post('/auth', [Controller::class, 'auth'])->name('login.auth'); //Conferir de dados de login estão corretos
Route::get('/deslog', [Controller::class, 'deslog'])->name('login.deslog'); //Deslogar

//Rotas de Painel de Controle e Ordens
Route::get('admin/painel', [Controller::class, 'painel'])->name('admin.painel'); //Acessar Dashboard
Route::get('/loja/ordens', [OrdemController::class, 'exibir'])->name('loja.inicio'); //Ver Ordens de Serviço
Route::get('/admin/clientes', [ClienteController::class, 'clientesmenu'])->name('admin.clientes'); //Dashboard de Clientes
Route::get('/admin/servicos', [ServicoController::class, 'servicosmenu'])->name('admin.servicos'); //Dashboard de Serviços
//Route::get('/loja/produtos', [ProdutoController::class, 'produtosmenu'])->name('loja.produtos'); //Dashboard de Produtos
Route::get('/admin/verealterar/cliente', [ClienteController::class, 'vercliente'])->name('admin.verealterar.cliente'); //Ver lista de Clientes PF
Route::get('/admin/verealterar/empresa', [ClienteController::class, 'verempresa'])->name('admin.verealterar.empresa'); //PVer lista de Clientes PJ
Route::get('/admin/verealterar/servico', [ServicoController::class, 'verservico'])->name('admin.verealterar.servico'); //Ver lista de Serviços

//Rotas de Cadastro
Route::get('/admin/cadastroclientes', [ClienteController::class, 'cadastro'])->name('admin.cadastro'); //Novo Cliente PF
Route::post('/admin/cadastroclientespf', [ClienteController::class, 'cadastropf'])->name('admin.cadastropf'); //Inserir Novo Cliente PF no SQL
Route::get('/admin/cadastroempresas', [ClienteController::class, 'cadastroempresas'])->name('admin.cadastroempresas'); //Novo Cliente PJ
Route::post('/admin/cadastroempresas', [ClienteController::class, 'cadastropj'])->name('admin.cadastropj'); //Inserir Novo Cliente PJ no SQL
Route::get('/admin/cadastroservicos', [ServicoController::class, 'cadastroservicos'])->name('admin.cadastroservicos'); //Novo Serviço
Route::post('/admin/inserirservicos', [ServicoController::class, 'inserirservicos'])->name('admin.inserirservicos'); //Inserir Novo Serviço no SQL
//Route::get('/loja/cadastroprodutos', [ProdutoController::class, 'cadastroprodutos'])->name('loja.cadastroprodutos'); //Novo Produto
//Route::get('/loja/verealterar/produto', [ProdutoController::class, 'verproduto'])->name('loja.verealterar.produto'); //Novo Produto
//Route::post('/loja/inserirprodutos', [ProdutoController::class, 'inserirprodutos'])->name('loja.inserirprodutos'); //Inserir Novo Produto no SQL
Route::get('/loja/cadastroordens', [OrdemController::class, 'cadastroordens'])->name('loja.cadastroordens'); //Primeira etapa para Cadastro de Ordem
Route::post('/loja/procurarcliente', [OrdemController::class, 'procurarcliente'])->name('loja.procurarcliente'); //puxar Nome do cliente para cadastro de Ordem
Route::get('/loja/cadastroordens/{id?}', [OrdemController::class, 'cadastroordens_id'])->name('loja.cadastroordens_id'); //Segunda etapa para Cadastro de Ordem
Route::post('/loja/procurarservico', [OrdemController::class, 'procurarservico'])->name('loja.procurarservico'); //puxar Nome do cliente para cadastro de Ordem
Route::get('/loja/cadastroordens/{id?}/{servico?}', [OrdemController::class, 'cadastroordens_id_servico'])->name('loja.cadastroordens_id_servico'); //terceira etapa para Cadastro de Ordem
Route::post('/loja/inserirordens', [OrdemController::class, 'inserirordens'])->name('loja.inserirordens'); //Inserir Nova Ordem no SQL

//Rotas para edição de Clientes PF
Route::get('/admin/verealterar/clienteselecionado/{id?}', [ClienteController::class, 'clienteselecionado'])->name('admin.verealterar.clienteselecionado'); //Formulário
Route::post('/admin/verealterar/atualizarcliente', [ClienteController::class, 'atualizarcliente'])->name('admin.verealterar.atualizarcliente'); //Atualização dos dados
Route::get('/admin/verealterar/inativarcliente/{id?}', [ClienteController::class, 'inativarcliente'])->name('admin.verealterar.inativarcliente'); //Confirmação de Inativação

//Rotas para edição de Clientes PJ
Route::get('/admin/verealterar/empresaselecionada/{id?}', [ClienteController::class, 'empresaselecionada'])->name('admin.verealterar.empresaselecionada'); //Formulário
Route::post('/admin/verealterar/atualizarempresa', [ClienteController::class, 'atualizarempresa'])->name('admin.verealterar.atualizarempresa'); //Atualização dos dados
Route::get('/admin/verealterar/inativarempresa/{id?}', [ClienteController::class, 'inativarempresa'])->name('admin.verealterar.inativarempresa'); //Confirmação de Inativação

//Rotas para edição de Serviços
Route::get('/admin/verealterar/servicoselecionado/{id?}', [ServicoController::class, 'servicoselecionado'])->name('admin.verealterar.servicoselecionado'); //Formulário
Route::post('/admin/verealterar/atualizarservico', [ServicoController::class, 'atualizarservico'])->name('admin.verealterar.atualizarservico'); //Atualização dos dados
Route::get('/admin/verealterar/inativarservico/{id?}', [ServicoController::class, 'inativarservico'])->name('admin.verealterar.inativarservico'); //Confirmação de Inativação

//Rotas para edição de Ordens de Serviço
Route::get('/loja/verealterar/ordem/{id?}', [OrdemController::class, 'ordemselecionada'])->name('loja.verealterar.ordemselecionada'); //Formulário
Route::post('/loja/verealterar/atualizarordem', [OrdemController::class, 'atualizarordem'])->name('loja.verealterar.atualizarordem'); //Atualização dos dados
//Route::get('/loja/verealterar/inativarordem/{id?}', [OrdemController::class, 'inativarordem'])->name('loja.verealterar.inativarordem'); //Confirmação de Inativação