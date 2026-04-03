<?php

use App\Livewire\branches\Create;
use App\Livewire\Faqs\Index;
use App\Livewire\Branch\Index as branch_index;
use App\Livewire\Branch\Edit as branch_edit;
use App\Livewire\Branch\Create as branch_create;
use App\Livewire\Category\Index as category_index;
use App\Livewire\Category\Edit as category_edit;
use App\Livewire\Category\Create as category_create;

use App\Livewire\Service\Index as service_index;
use App\Livewire\Service\Edit as service_edit;
use App\Livewire\Service\Create as service_create;
use App\Livewire\Employee\Index as employee_index;
use App\Livewire\Employee\Edit as employee_edit;
use App\Livewire\Employee\Create as employee_create;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::view(uri: 'sample', view: 'sample')
    ->middleware(middleware: ['auth', 'verified'])
    ->name('sample');


    Route::middleware( ['auth', 'verified'])->group(function (){
    Route::prefix('reserves/')->name('reserves.')->
    group(function(){
            Route::get('index' , Index::class)->name('index');


    });
        Route::prefix('branches/')->name('branches.')->
    group(function(){
            Route::get('index' , branch_index::class)->name('index');
            Route::get('create' , branch_create::class)->name('create');
            Route::get('edit/{branch}' , branch_edit::class)->name('edit');
    });
        Route::prefix('categories/')->name('categories.')->
    group(function(){
            Route::get('index' , category_index::class)->name('index');
            Route::get('create' , category_create::class)->name('create');
            Route::get('edit' , category_edit::class)->name('edit');
    });
        Route::prefix('services/')->name('services.')->
    group(function(){
            Route::get('index' , service_index::class)->name('index');
            Route::get('create' , service_create::class)->name('create');
            Route::get('edit' , service_edit::class)->name('edit');
    });
        Route::prefix('employees/')->name('employees.')->
    group(function(){
            Route::get('index' , employee_index::class)->name('index');
            Route::get('create' , employee_create::class)->name('create');
            Route::get('edit' , employee_edit::class)->name('edit');
    });
    });






Route::view('dashboard', view: 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

        Route::get('menu_type1', Index::class)
    ->middleware(middleware: ['auth', 'verified'])
    ->name('menu_type1');

    //         Route::get('menu_type1/create', Create::class)
    // ->middleware(middleware: ['auth', 'verified'])
    // ->name('menu_type1.create');


require __DIR__.'/settings.php';

