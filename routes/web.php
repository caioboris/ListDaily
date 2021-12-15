<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\MinhasListasController::class, 'index'])->name('home');

Route::post('/criarLista', [App\Http\Controllers\CriarListaController::class, 'criar'])->name('lista.criar');
Route::post('/editarLista', [App\Http\Controllers\ProdutoController::class, 'adicionar'])->name('lista.editar');
Route::post('/updateLista', [App\Http\Controllers\EditarListaController::class, 'editar'])->name('lista.update');
Route::post('/compartilharLista', [App\Http\Controllers\CompartilharListaController::class, 'compartilhar'])->name('lista.compartilhar');
Route::post('/removerUsuarioLista', [App\Http\Controllers\RemoverUsuarioController::class, 'removerUsuario'])->name('lista.removerUsuario');

Route::post('/lista', [App\Http\Controllers\ProdutoController::class, 'destroy'])->name('produto.remover');

Route::post('/verificarCodigo', [App\Http\Controllers\VerificarProdutoController::class, 'verificar'])->name('verificar');

Route::post('/editarProduto', [App\Http\Controllers\EditarProdutoController::class, 'update'])->name('produto.editar');

Route::post('/storeLista', [App\Http\Controllers\StoreListaController::class, 'store'])->name('lista.store');

Route::get('/lista', [App\Http\Controllers\ProdutoController::class, 'index'])->name('lista.page');

Route::post('/deletarLista', [App\Http\Controllers\DeletarListaController::class, 'delete'])->name('lista.deletar');

Route::get('/admin', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('admin');

Route::get('/admin/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('admin.login');

Route::get('/admin/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('admin.logout');

Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

