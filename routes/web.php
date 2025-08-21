<?php

use App\Http\Controllers\AcessoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');

//Se não logado
Route::middleware([CheckIsNotLogged::class])->group(function(){
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

//Se logado
Route::middleware([CheckIsLogged::class])->group(function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('usuario')->group(function(){
        Route::get('/', [UsuarioController::class, 'index'])->name('usuario');
        Route::get('/listar', [UsuarioController::class, 'listar'])->name('usuario.listar');
        Route::post('/block', [UsuarioController::class, 'bloquear'])->name('usuario.bloquear');
        Route::post('/salvar', [UsuarioController::class, 'salvar'])->name('usuario.salvar');
        Route::post('/deletar', [UsuarioController::class, 'deletar'])->name('usuario.deletar');
    });
    Route::prefix('cadastro')->group(function(){
        Route::prefix('grupo')->group(function(){
            Route::get('/', [GrupoController::class, 'index'])->name('grupo');
            Route::get('/listar', [GrupoController::class, 'listar'])->name('grupo.listar');
            Route::post('/salvar', [GrupoController::class, 'salvar'])->name('grupo.salvar');
            Route::post('/deletar', [GrupoController::class, 'deletar'])->name('grupo.deletar');
        });
        Route::prefix('acesso')->group(function(){
            Route::get('/', [AcessoController::class, 'index'])->name('acesso');
            Route::get('/listar', [AcessoController::class, 'listar'])->name('acesso.listar');
            Route::post('/salvar', [AcessoController::class, 'salvar'])->name('acesso.salvar');
            Route::post('/deletar', [AcessoController::class, 'deletar'])->name('acesso.deletar');
        });
    });
});
