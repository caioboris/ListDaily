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

Route::get('/estoque', [App\Http\Controllers\MedidaController::class,'index'])->name('estoque');
Route::post('/estoque', [App\Http\Controllers\ProdutoController::class,'adicionar'])->name('estoque.adicionar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/minhasListas', [App\Http\Controllers\MinhasListasController::class, 'index'])->name('lista');

Route::post('/minhasListas', [App\Http\Controllers\MinhasListasController::class, 'criar'])->name('lista.criar');

Route::get('/admin', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('admin');

Route::get('/admin/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('admin.login');

Route::get('/admin/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('admin.logout');

Route::get('lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

