<?php

use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\EspecialidadController;
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

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::get('logout', [UserController::class, 'logout']);

    //especialidad
    Route::post("createEspecialidad", [EspecialidadController::class, 'create']);
    Route::get("indexEspecialidad", [EspecialidadController::class, 'index']);
    Route::get("showEspecialidad/{id}", [EspecialidadController::class, 'show']);
    Route::delete("destroyEspecialidad/{id}", [EspecialidadController::class, 'destroy']);
    Route::put("updateEspecialidad/{id}", [EspecialidadController::class, 'update']);

    //cliente
    Route::post("createCliente", [ClienteController::class, 'create']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
