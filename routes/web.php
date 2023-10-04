<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//esta definición nos devuelve la vista welcome

Route::view('/', 'welcome')->name('welcome');


Route::get('/chirps', function () {
     return 'welcome to our chirps page';
 })->name('chirps.index');

 Route::post(); //para envìos de formulario o crear nuevos recuersos
 Route::put(); //actualiza recursos
 Route::delete(); //elimina recursos

 //REDIRECCIONA A CHIRPS 'welcome to our chirps page' CUANDO PONEMOS EL No.2, redirect 
 //SIGNO ?, NOS DA UN PARÁMETRO OPCIONAL, POR ESO AL EJECUTAR, NOS REEDIRECCIONA A /chirps, es la función que se ejecuta
 //->route('chirps.index') nombre de la ruta a la que queremos redireccionar
// Route::get('/chirps/{chirp}', function ($chirp) {
//     if ($chirp === '2') {
//         return to_route('chirps.index');
//     }
//     return 'Chirp detail ' . $chirp;
// });


 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth', 'verified'])->name('dashboard');

 Route::middleware('auth')->group(function () {
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });

// require __DIR__.'/auth.php';
