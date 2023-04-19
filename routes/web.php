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

use App\Http\Controllers\BombaController;
use App\Http\Controllers\MapaController;
// 
/*
|-------------------------------------------------------------------|
| Rotas do projecto Angofuel                                        |
|-------------------------------------------------------------------|
| Route::get('/login', [BombaController::class, 'login']);          |
| Route::get('/user/signin', [BombaController::class, 'create']);   |
| Route::get('/dashboard', [BombaController::class, 'dash']);       |
| Route::get('/profile', [BombaController::class, 'profile']);      |
|                                                                   |
|-------------------------------------------------------------------|
*/

/** Links Principais */
Route::get('/',[BombaController::class, 'index']);
Route::get('/about', [BombaController::class, 'about']);
Route::get('/dashboard', [BombaController::class, 'dashboard'])->middleware('auth');

/** Links do Administrador */
Route::get('/adminfolder/gestorfolder/gestor', [BombaController::class, 'gestor']);
Route::get('/adminfolder/empresafolder/empresas', [BombaController::class, 'empresa'])->middleware('auth');
Route::get('/adminfolder/userfolder/userlogado', [BombaController::class, 'userlogado'])->middleware('auth');
Route::get('/bomb/statistic', [BombaController::class, 'statistic'])->middleware('auth');
Route::get('/bomb/mensagem', [BombaController::class, 'mensagem'])->middleware('auth');
Route::get('/bomb/log', [BombaController::class, 'logs'])->middleware('auth');

/** Links do Administrador */
Route::get('/bomb/posto', [BombaController::class, 'posto'])->middleware('auth');

/* Acções das bombas de Combustíveis */
Route::get('/bomb/createbomba', [BombaController::class, 'createbomba'])->middleware('auth');
Route::delete('/bomb/{id}', [BombaController::class, 'destroy'])->middleware('auth');/** Eliminar */
Route::get('/bomb/edit/{id}', [BombaController::class, 'edit'])->middleware('auth');/**link para atualizar os dados */
Route::get('/bomb/fuel/{id}', [BombaController::class, 'fuel'])->middleware('auth');/**link para atualizar os combustíveis */
Route::put('/bomb/update/{id}', [BombaController::class, 'update'])->middleware('auth');/**link da action do formulario para atualizar os dados */
Route::post('/bomb', [BombaController::class, 'store']);

/* Acções da Empresa */
Route::get('/adminfolder/empresafolder/createempresa', [BombaController::class, 'createempresa'])->middleware('auth');
Route::delete('/adminfolder/empresafolder/empresas/{id}', [BombaController::class, 'destroyempresa'])->middleware('auth');/** Eliminar */
Route::get('/adminfolder/empresafolder/editempresa/{id}', [BombaController::class, 'editempresa'])->middleware('auth');/**link para atualizar os dados */
Route::put('/adminfolder/empresafolder/updateempresa/{id}', [BombaController::class, 'updateempresa'])->middleware('auth');/**link da action do formulario para atualizar os dados */
Route::post('/adminfolder/empresafolder/empresas', [BombaController::class, 'storeempresa']);

/* Acções do Gestor */
Route::get('/adminfolder/gestorfolder/creategestor', [BombaController::class, 'creategestor'])->middleware('auth');
Route::delete('/adminfolder/gestorfolder/gestor/{id}', [BombaController::class, 'destroygestor'])->middleware('auth');/** Eliminar */
Route::get('/adminfolder/gestorfolder/editgestor/{id}', [BombaController::class, 'editgestor'])->middleware('auth');/**link para atualizar os dados */
Route::put('/adminfolder/gestorfolder/updategestor/{id}', [BombaController::class, 'updategestor'])->middleware('auth');/**link da action do formulario para atualizar os dados */
Route::post('/adminfolder/gestorfolder/gestor', [BombaController::class, 'storegestor']);

/* Acções do UserLogado */
Route::delete('/adminfolder/userfolder/userlogado/{id}', [BombaController::class, 'destroyuser'])->middleware('auth');
Route::get('/adminfolder/userfolder/createuser', [BombaController::class, 'createuser'])->middleware('auth');
Route::get('/adminfolder/userfolder/edituser/{id}', [BombaController::class, 'edituser'])->middleware('auth');/**link para atualizar os dados */
Route::put('/adminfolder/userfolder/updateuser/{id}', [BombaController::class, 'updateuser'])->middleware('auth');/**link da action do formulario para atualizar os dados */
Route::post('/adminfolder/userfolder/userlogado', [BombaController::class, 'storeuser']);

/* Acções do User */
Route::get('/userdir/mensagem', [BombaController::class, 'mensage'])->middleware('auth');
Route::get('/msgvisita', [BombaController::class, 'msgvisita']);
Route::post('/userdir/mensagem', [BombaController::class, 'storemensagem']);
Route::post('/msgvisita/create', [BombaController::class, 'createmensagem']);


/* Rotas do Mapa */
Route::get('/map/resultado', [MapaController::class, 'mapa']);
Route::get('/mapavisita', [MapaController::class, 'mapavisita']);


/** Download PDF */

Route::get('/bomb/pdf', [BombaController::class, 'imprimir'])->middleware('auth');




/* Rota da jetstream
Route::middleware(['auth:sanctum','verified'
])->get('/dashboard', [BombaController::class, 'dashboard'
])->name('dashboard');

*/


/**/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [BombaController::class, 'dashboard'])->name('dashboard')->middleware('auth');
}); 

