<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::controller(\App\Http\Controllers\ArticuloController::class)->group(function(){
        Route::get('articulos', 'index')->name('articulos.index');
        Route::get('articulos/create', 'create')->name('articulos.create');
        Route::get('articulos/{id}', 'show')->name('artic   ulos.show');
        Route::post('articulos/', 'store')->name('articulos.store');
        Route::delete('articulos/{articulo}', 'destroy')->name('articulos.delete');
        Route::put('articulos/{articulo}', 'update')->name('articulos.update');
        Route::get('articulos/{articulo}/edit','edit')->name('articulos.edit');
    }
);

Route::post('articulos/{articulo}/comentarios',[\App\Http\Controllers\ArticuloController::class,'store'])->name('comentarios.store');


require __DIR__.'/auth.php';
