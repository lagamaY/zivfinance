<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonneController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/



Route::get('/', [PersonneController::class, 'index'])->name('personnes.index');
Route::get('/personnes/create', [PersonneController::class, 'create'])->name('personnes.create');
Route::post('/personnes', [PersonneController::class, 'store'])->name('personnes.store');
Route::delete('/personnes/{id}', [PersonneController::class, 'destroy']);




