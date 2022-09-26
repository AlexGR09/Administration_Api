<?php

use App\Http\Controllers\Api\CaracteristicasUbicacionController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\EspecialidadController;
use App\Http\Controllers\Api\InformacionFiscalController;
use App\Http\Controllers\Api\UbicacionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('test', TestController::class)->only('index', 'store', 'show', 'update', 'destroy');


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    //crud Usuario
    Route::get('indexUser', [UserController::class, 'index']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::delete('destroyUser',[UserController::class, 'delete']);
    Route::delete('deleteUser/{id}',[UserController::class, 'deleteUser']);
    Route::put('updateUser/{id}', [UserController::class, 'update']);

    //crud Especialidad
    Route::post("createEspecialidad", [EspecialidadController::class, 'create']);
    Route::get("indexEspecialidad", [EspecialidadController::class, 'index']);
    Route::get("showEspecialidad/{id}", [EspecialidadController::class, 'show']);
    Route::delete("destroyEspecialidad/{id}", [EspecialidadController::class, 'destroy']);
    Route::put("updateEspecialidad/{id}", [EspecialidadController::class, 'update']);

    //crud Cliente
    Route::post("storeCliente", [ClienteController::class, 'store']);
    Route::get("indexCliente", [ClienteController::class, 'index']);
    Route::put("updateCliente/{id}", [ClienteController::class, 'update']);
    Route::delete("destroyCliente/{id}", [ClienteController::class, 'delete']);
    Route::get("showCliente", [ClienteController::class,'show']);

    //curd ubicaciones
    Route::post("registerUbicaciones", [UbicacionController::class, 'store']);
    Route::put("updateUbicaciones/{id}", [UbicacionController::class, 'update']); 
    Route::get("showUbicaciones", [UbicacionController::class, 'show']);
    Route::get("indexUbicaciones", [UbicacionController::class, 'index']);
    Route::delete("deleteUbicaciones/{id}", [UbicacionController::class, 'delete']);

    //crud caract ubicaciones
    Route::post("createCaracteristicas",[CaracteristicasUbicacionController::class, 'store']);
    Route::get("showCaracteristicas", [CaracteristicasUbicacionController::class, 'show']);
    Route::put("updateCaracteristicas/{id}", [CaracteristicasUbicacionController::class, 'update']);
    Route::delete("deleteCaracteristicas/{id}", [CaracteristicasUbicacionController::class, 'delete']);

    //crud info fiscal
    Route::get("indexInfoFiscal",[InformacionFiscalController::class, "index"]);
    Route::post("createInformacionFiscal",[InformacionFiscalController::class, "store"]);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
