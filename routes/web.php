<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CadClientesController;
use App\Http\Controllers\AdminController;
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
Route::get('/', HomeController::class)->name('home');
Route::post('painel', [UsuarioController::class, 'login'])->name('usuario.login');
Route::get('/', [UsuarioController::class, 'logout'])->name('usuarios.logout');

Route::get('home-admin', [AdminController::class, 'index'])->name('admin.index');
Route::put('admin/{usuario}',[AdminController::class, 'editar'])->name('admin.editar');

Route::get('clientes', [CadClientesController::class, 'index'])->name('clientes.index');
Route::post('clientes', [CadClientesController::class, 'insert'])->name('clientes.insert');
Route::get('clientes/inserir', [CadClientesController::class, 'create'])->name('clientes.inserir');
Route::get('clientes/{item}/edit', [CadClientesController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{item}', [CadClientesController::class, 'editar'])->name('clientes.editar');
Route::delete('cliente/{item}',[CadClientesController::class, 'delete'])->name('clientes.delete');
Route::get('cliente/{item}/delete',[CadClientesController::class, 'modal'])->name('clientes.modal');
