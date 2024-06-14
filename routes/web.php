<?php

use App\Http\Controllers\Business\HomeController;
use App\Http\Controllers\Business\PlaceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth:web')->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('business.home');

    Route::prefix('business')->as('business.')->group(function (){
        Route::resource('place', PlaceController::class);
    });
});
