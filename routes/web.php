<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Chirp;
use App\Models\User;

//esta definición nos devuelve la vista welcome

Route::view('/', 'welcome')->name('welcome');


//  Route::post(); //para envìos de formulario o crear nuevos recuersos
//  Route::put(); //actualiza recursos
//  Route::delete(); //elimina recursos

 //REDIRECCIONA A CHIRPS 'welcome to our chirps page' CUANDO PONEMOS EL No.2, redirect 
 //SIGNO ?, NOS DA UN PARÁMETRO OPCIONAL, POR ESO AL EJECUTAR, NOS REEDIRECCIONA A /chirps, es la función que se ejecuta
 //->route('chirps.index') nombre de la ruta a la que queremos redireccionar
// Route::get('/chirps/{chirp}', function ($chirp) {
//     if ($chirp === '2') {
//         return to_route('chirps.index');
//     }
//     return 'Chirp detail ' . $chirp;
// });
 Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');  //se pone método view, paara que nos devuelva la vista
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     Route::get('/chirps', function () {
        return view('chirps.index');
    })->name('chirps.index');

     Route::post('/chirps', function () {
         //guardando variable message para después insertarla en la bd
        Chirp::create([
            'message' => request('message'),
            'user_id' => auth()->id(), 
         ]);

         //session()->flash('status','Chirp created successfully!');

         return to_route('chirps.index')
            ->with('status','Chirp created successfully!');
     });
 });

require __DIR__.'/auth.php';
