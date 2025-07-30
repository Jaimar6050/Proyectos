<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Ventas;
use App\Livewire\Productos;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
