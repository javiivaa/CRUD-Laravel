<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegaloController;
use App\Http\Middleware\SimpleToken;

Route::get('/', function () {
    return view('welcome');
});
//Muestra una lista de los regalos

Route::get('/regalos', [RegaloController::class, 'index'])->name('regalos.index');

// Nos lleva a la vista para crear un nuevo regalo
Route::get('/regalos/create', [RegaloController::class, 'create'])->name('regalos.create');
//Almacena los regalos en la base de datos
Route::post('/regalos', [RegaloController::class, 'store'])->name('regalos.store')->middleware(SimpleToken::class);

//Mustra un regalo de manera individual llevandonos a una vista
Route::get('/regalos/{id}', [RegaloController::class, 'show'])->name('regalos.show');
//Nos lleva a la vista para editar los regalos
Route::get('/regalos/{id}/edit', [RegaloController::class, 'edit'])->name('regalos.edit');

//Actualiza los regalos en la base de datos
Route::put('/regalos/{id}', [RegaloController::class, 'update'])->name('regalos.update')->middleware(SimpleToken::class);
// Borra el regalo de la base de datos
Route::delete('/regalos/{id}', [RegaloController::class, 'destroy'])->name('regalos.destroy')->middleware(SimpleToken::class);
