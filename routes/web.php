<?php

use App\Http\Livewire\AlquileresIndex;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Peliculas;
use App\Http\Livewire\ActorPeliculaComponent;
use App\Http\Livewire\Socios;
use App\Http\Livewire\Directores;
use App\Http\Livewire\Formatos;
use App\Http\Livewire\Generos;
use App\Http\Livewire\Sexos;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/alquileres', \App\Http\Livewire\AlquileresIndex::class)->name('alquileres.index');
Route::get('/peliculas', Peliculas::class)->name('peliculas');
Route::get('/actor-pelicula', ActorPeliculaComponent::class)->name('actor-pelicula');
Route::get('/socios', Socios::class)->name('socios');
Route::get('/generos', Generos::class)->name('generos');
Route::get('/sexos', Sexos::class)->name('sexos');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
