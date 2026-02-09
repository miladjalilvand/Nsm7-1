<?php

use App\Livewire\Faqs\Create;
use App\Livewire\Faqs\Index;
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

        Route::get('menu_type1', Index::class)
    ->middleware(middleware: ['auth', 'verified'])
    ->name('menu_type1');

            Route::get('menu_type1/create', Create::class)
    ->middleware(middleware: ['auth', 'verified'])
    ->name('menu_type1.create');


require __DIR__.'/settings.php';
