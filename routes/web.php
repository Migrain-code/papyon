<?php

use App\Http\Controllers\Business\HomeController;
use App\Http\Controllers\Business\PlaceController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\MenuCategoryProductController;
use App\Http\Controllers\MenuPasswordController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\OrderController;
Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth:web')->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('business.home');

    Route::prefix('business')->as('business.')->group(function (){
        Route::resource('place', PlaceController::class);
        Route::prefix('place/{place}')->as('place.')->group(function (){
            Route::get('clone', [PlaceController::class, 'clonePlace'])->name('clone');
        });
        Route::resource('table', TableController::class);
        Route::resource('menu', MenuController::class);
        Route::prefix('menu/{menu}')->as('menu.')->group(function (){{
            Route::get('status', [MenuController::class, 'statusView'])->name('status');
            Route::post('update/price', [MenuController::class, 'updatePrice'])->name('updatePrice');
            Route::get('pop-up-banner', [MenuController::class, 'popupView'])->name('popup');
            Route::get('update-pop-up-status', [MenuController::class, 'updatePopupStatus'])->name('updatePopupStatus');
            Route::post('update-up-banner', [MenuController::class, 'updatePopup'])->name('updatePopup');

            Route::get('menu-crypted', [MenuPasswordController::class, 'crytpedView'])->name('crytpedView');
            Route::get('update-password-status', [MenuPasswordController::class, 'updatePasswordStatus'])->name('updatePasswordStatus');
            Route::post('update-password', [MenuPasswordController::class, 'updatePassword'])->name('updatePassword');
        }});
        Route::resource('menu-category', MenuCategoryController::class);
        Route::resource('menu-category-product', MenuCategoryProductController::class);
        Route::resource('claim', ClaimController::class);
        Route::resource('order', OrderController::class);
        Route::prefix('order/{order}')->as('order.')->group(function (){
            Route::post('update-discount', [OrderController::class, 'updateDiscount'])->name('discount.update');
            Route::post('add-product', [OrderController::class, 'addProduct'])->name('addProduct');
            Route::post('get-payment', [OrderController::class, 'getPayment'])->name('getPayment');
        });
        Route::prefix('excel')->as('excel.')->group(function (){
            Route::get('/import-export', [ExcelController::class, 'index'])->name('index');
            Route::get('/category-export', [ExcelController::class, 'categoryExport'])->name('category.export');
            Route::post('/category-import', [ExcelController::class, 'categoryImport'])->name('category.import');
            Route::post('/product-import', [ExcelController::class, 'productImport'])->name('product.import');
            Route::get('/product-export', [ExcelController::class, 'productExport'])->name('product.export');
        });
        Route::post('/update-category-order', [MenuCategoryController::class, 'updateOrder'])->name('category.updateOrder');
        Route::post('/update-product-order', [MenuCategoryProductController::class, 'updateOrder'])->name('product.updateOrder');

        Route::get('download/{region}/zip', [TableController::class, 'downloadZip'])->name('downloadRegion');
        Route::get('download/{table}/table', [TableController::class, 'downloadTable'])->name('downloadTable');
    });
});
