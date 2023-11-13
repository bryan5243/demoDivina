<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ChequeoMedicoController;

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


Route::get('pacientes', [PacienteController::class, 'listar']);
Route::put('pacientes/{id}', [PacienteController::class, 'actualizar']);
Route::post('/usuarios/login', [UsuarioController::class, 'login']);
Route::post('pacientes/buscarPorCedula', [PacienteController::class, 'buscarPorCedula']);




Route::get('/chequeomedico',  [ChequeoMedicoController::class, 'listar']);
Route::get('/chequeomedico/{id}', [ChequeoMedicoController::class, 'cargarDatos']);

Route::get('/usuarios', [UsuarioController::class, 'listar']);
Route::post('/usuarios', [UsuarioController::class, 'guardar']);
Route::put('/usuarios/{id}', [UsuarioController::class, 'actualizar']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
