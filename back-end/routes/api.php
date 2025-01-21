<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function (): void {
    Route::post('/register', [AuthController::class, 'createUser']);
    Route::post('/login', [AuthController::class, 'loginUser']);
    Route::get('logout', [AuthController::class, 'logout'])
        ->middleware('auth:api');
    Route::get('user', [AuthController::class, 'user'])
        ->middleware('auth:api');
});

Route::middleware(['auth:api'])->resource('usuario', UsuarioController::class);
Route::post("syncperfils/{usuario}", [UsuarioController::class, "syncPerfils"])->middleware('auth:api');


Route::middleware(['auth:api'])->resource('perfil', PerfilController::class);
Route::middleware(['auth:api'])->resource('tarefa', TarefaController::class);
Route::middleware(['auth:api'])->put("tarefa/finalizar/{tarefa}", [TarefaController::class, "finalizar"]);
