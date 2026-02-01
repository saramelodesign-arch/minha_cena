<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;

/*
| Rotas públicas (visitante)
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/bands', [BandController::class, 'index']);
Route::get('/bands/{id}', [BandController::class, 'show']);
Route::get('/bands/{id}/albums', [AlbumController::class, 'index']);

/*
| Autenticação necessária (user autenticado)
*/

Route::middleware(['auth'])->group(function () {

    /*
    | Bandas (user autenticado pode criar / editar / apagar)
    */

    Route::get('/add-band', [BandController::class, 'create']);
    Route::post('/add-band', [BandController::class, 'store']);
    Route::get('/bands/{id}/edit', [BandController::class, 'edit']);
    Route::put('/bands/{id}', [BandController::class, 'update']);
    Route::delete('/bands/{id}', [BandController::class, 'destroy']);

    /*
    | Álbuns (user autenticado pode criar / editar / apagar)
    */

    Route::get('/bands/{id}/albums/add', [AlbumController::class, 'create']);
    Route::post('/bands/{id}/albums/add', [AlbumController::class, 'store']);
    Route::get('/albums/{id}/edit', [AlbumController::class, 'edit']);
    Route::put('/albums/{id}', [AlbumController::class, 'update']);
    Route::delete('/albums/{id}', [AlbumController::class, 'destroy']);
});

/*
| Administração (apenas gestor)
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/add-user', [UserController::class, 'create']);
    Route::post('/add-user', [UserController::class, 'store']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});

/*
| Fallback
*/

Route::fallback(function () {
    return view('fallback');
});
