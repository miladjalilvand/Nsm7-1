<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\authenticationController;
use Illuminate\Support\Facades\Route;

Route::get('view_auth_sms',  [authenticationController::class , 'view_auth_sms']);

Route::post('auth_sms'    ,  [authenticationController::class , 'auth_sms']);

Route::prefix('/admin')->name('admin.')->group(function()
{
    Route::get('create' ,  [AdminController::class , 'create'])->name('create');

    Route::post('store' ,  [AdminController::class , 'store'])->name('store');


});
