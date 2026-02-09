<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::view(uri: 'sample', view: 'sample')
    ->middleware(middleware: ['auth', 'verified'])
    ->name('sample');

Route::view('dashboard', view: 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    

require __DIR__.'/settings.php';
