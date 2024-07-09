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
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SwiperAdvertController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SubscribtionController;
use App\Http\Controllers\PlaceUnitController;
Route::get('/', function () {
    return view('welcome');
});

Route::post('/packet/{package}/callback/{user}', [SubscribtionController::class, 'callback'])->name('business.subscribtion.payment.callback');

Route::middleware(['auth:web', 'twoFactor'])->group(function (){
    Route::post('cikis-yap', [HomeController::class, 'logout'])->name('business.logout');
    Route::get('/2FA-verification', [HomeController::class, 'twoFactorShow'])->name('business.twoFactor');
    Route::post('/2FA-verification', [HomeController::class, 'twoFactorSms'])->name('business.twoFactor.verify');
    Route::get('/2FA-verification-resend', [HomeController::class, 'resendCode'])
        ->name('business.twoFactor.resend')
        ->middleware('throttle:3,4'); // 1. parametre istek sayısı 2.dakika;

    Route::get('/home', [HomeController::class, 'index'])->name('business.home');

    Route::prefix('business')->as('business.')->group(function (){
        Route::resource('place', PlaceController::class);
        Route::prefix('place/{place}')->as('place.')->group(function (){
            Route::get('clone', [PlaceController::class, 'clonePlace'])->name('clone');
        });
        Route::resource('table', TableController::class);
        Route::resource('region', RegionController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('place-unit', PlaceUnitController::class);
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
        Route::prefix('menu-category/{category}')->as('menuCategory.')->group(function (){
            Route::get('/create', [MenuCategoryProductController::class, 'create'])->name('create');
            Route::post('/create-product', [MenuCategoryProductController::class, 'store'])->name('store');
        });
        Route::resource('claim', ClaimController::class);
        Route::prefix('claims')->as('claim.')->group(function (){
            Route::get('taxi', [ClaimController::class, 'taxi'])->name('taxi');
            Route::get('vale', [ClaimController::class, 'vale'])->name('vale');
            Route::get('waiter', [ClaimController::class, 'waiter'])->name('waiter');
            Route::get('packet', [ClaimController::class, 'packet'])->name('packet');
        });
        Route::resource('order', OrderController::class);
        Route::prefix('order/{order}')->as('order.')->group(function (){
            Route::get('detail', [OrderController::class, 'detail'])->name('detail');
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

        Route::resource('swiper-advert', SwiperAdvertController::class);

        /** ----------------------------- Kullanıcı Ayarları ----------------------------  **/
        Route::prefix('setting')->as('setting.')->group(function (){
            Route::get('/',  [SettingController::class, 'index'])->name('index');
            /** --------------------------Güvenlik Rotaları --------------------------------- */
            Route::get('/security',  [SettingController::class, 'security'])->name('security');
            Route::post('/update-password',  [SettingController::class, 'changePassword'])->name('updatePassword');
            Route::post('/enable-two-factor-authentication', [SettingController::class, 'activeTwoFactorAuth'])->name('twoFactorActive');
            Route::post('/disable-factor-authentication', [SettingController::class, 'passiveTwoFactorAuth'])->name('disableTwoFactor');
            /** -------------------------- Faturalar --------------------------------- */
            Route::get('/invoice',  [SettingController::class, 'invoice'])->name('invoice');
            Route::get('/bildirim-izinleri',  [SettingController::class, 'notificationPermission'])->name('notificationPermission');
            Route::post('/bildirim-izinleri-guncelle',  [SettingController::class, 'notificationPermissionUpdate'])->name('notificationPermission.update');
            Route::post('/update-info',  [SettingController::class, 'updateInfo'])->name('updateInfo');
        });

        Route::resource('announcement', AnnouncementController::class);
        Route::resource('contract', ContractController::class);

        Route::prefix('subscribtion')->as('subscribtion.')->group(function (){
            Route::get('/', [SubscribtionController::class, 'index'])->name('index');
            Route::get('/{slug}/satin-al', [SubscribtionController::class, 'payForm'])->name('payForm');
            Route::post('/{slug}/odeme-yap', [SubscribtionController::class, 'pay'])->name('pay');
            Route::get('/odeme-basarili', [SubscribtionController::class, 'success'])->name('payment.success');
            Route::get('/odeme-basarisiz', [SubscribtionController::class, 'fail'])->name('payment.fail');

        });

        Route::prefix('ajax')->group(function (){
           Route::post('all-delete-object', [\App\Http\Controllers\AjaxController::class, 'allDelete']);
        });
    });
});
