<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'admin']);


Route::middleware(['auth'])->group(function () {

    Route::get('/users', [UserController::class, 'index']);

    Route::get('/users/{id}', [UserController::class, 'show']);


    Route::middleware(['admin'])->group(function () {
        Route::get('/add-user', [UserController::class, 'create']);
        Route::post('/add-user', [UserController::class, 'store']);
        Route::get('/users/{id}/edit', [UserController::class, 'edit']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);
    });
});

use App\Http\Controllers\BandController;

Route::get('/bands', [BandController::class, 'index']);
Route::get('/bands/{id}', [BandController::class, 'show']);

Route::middleware(['admin'])->group(function () {
    Route::get('/add-band', [BandController::class, 'create']);
    Route::post('/add-band', [BandController::class, 'store']);
});


use App\Http\Controllers\AlbumController;

Route::get('/bands/{id}/albums', [AlbumController::class, 'index']);

Route::middleware(['admin'])->group(function () {
    Route::get('/bands/{id}/albums/add', [AlbumController::class, 'create']);
    Route::post('/bands/{id}/albums/add', [AlbumController::class, 'store']);
});
