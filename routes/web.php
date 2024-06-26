<?php

use App\Http\Controllers\Business\HomeController;
use App\Http\Controllers\Business\PlaceController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\MenuCategoryProductController;
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth:web')->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('business.home');

    Route::prefix('business')->as('business.')->group(function (){
        Route::resource('place', PlaceController::class);
        Route::resource('table', TableController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('menu-category', MenuCategoryController::class);
        Route::resource('menu-category-product', MenuCategoryProductController::class);
        Route::get('download/{region}/zip', [TableController::class, 'downloadZip'])->name('downloadRegion');
        Route::get('download/{table}/table', [TableController::class, 'downloadTable'])->name('downloadTable');
    });
});
