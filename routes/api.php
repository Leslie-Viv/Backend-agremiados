<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgremiadosController;
use App\Http\Controllers\SolicitudesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::controller(UserController::class)->group (function(){
    Route::post('login','loginUsuario');
    Route::get('usuarios', 'getUsuarios');
     Route::post('nuevousuario', 'newUsuario');
});

Route::controller(AgremiadosController::class)->group (function(){
    Route::post("nuevoagremiado",'nuevoAgremiado');
    Route::get('agremiado', 'getAgremiado');
    Route::delete('eliminarAgremiado/{id}', 'deleteAgremiadoById');
    Route::post('actualizarAgremiado/{id}', 'updateAgremiado');
});

Route::controller(SolicitudesController::class)->group(function () {
    Route::patch('actualizarsolicitud/{id}', 'updateSolicitud');
    Route::get('obtenerSolicitud', 'getSolicitud');
    Route::delete('eliminarsolicitud/{id}', 'deleteSolicitudById');
    Route::post('agregarsolicitud', 'nuevasolicitud');
    Route::get('app/public/ruta_del_archivo/{nombreArchivo}', 'descargarArchivo');
});
