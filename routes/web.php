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
use App\Http\Controllers\QrMenuController;
use App\Http\Controllers\CartController;
use \App\Http\Controllers\PlaceMenuController;
use App\Http\Controllers\MenuDesignController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\SouceController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\SuggestionQuestionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\PasswordResetController;

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('front.index');
Route::get('ozellikler', [\App\Http\Controllers\Frontend\HomeController::class, 'features'])->name('property.index');
Route::get('ozellikler/{slug}/detay', [\App\Http\Controllers\Frontend\HomeController::class, 'featureDetail'])->name('property.detail');
Route::get('bloglar', [\App\Http\Controllers\Frontend\HomeController::class, 'blogs'])->name('blog.index');
Route::get('blog/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'blogCategory'])->name('blog.category');
Route::get('blog/{slug}/detay', [\App\Http\Controllers\Frontend\HomeController::class, 'blogDetail'])->name('blog.detail');
Route::get('sss', [\App\Http\Controllers\Frontend\HomeController::class, 'faq'])->name('faq.index');
Route::get('entegrasyonlar', [\App\Http\Controllers\Frontend\HomeController::class, 'entegration'])->name('entegration.index');
Route::get('package', [\App\Http\Controllers\Frontend\HomeController::class, 'package'])->name('package.index');
Route::get('is-birligi', [\App\Http\Controllers\Frontend\HomeController::class, 'partnership'])->name('partnership.index');
Route::get('sayfa/{slug}', [\App\Http\Controllers\Frontend\HomeController::class, 'pageDetail'])->name('page.detail');
Route::post('is-birligi', [\App\Http\Controllers\Frontend\HomeController::class, 'partnershipForm'])
    ->middleware('throttle:3,4') // 1. parametre istek sayısı 2.dakika. yani 4 dakikada 3 istek atabilir;
    ->name('partnership.store');
Route::post('demo-request', [\App\Http\Controllers\Frontend\HomeController::class, 'demoRequest'])->name('demoRequest');

Route::get('iletisim', [\App\Http\Controllers\Frontend\HomeController::class, 'contact'])->name('contact.index');
Route::post('iletisim-formu', [\App\Http\Controllers\Frontend\HomeController::class, 'contactForm'])
    ->middleware('throttle:3,4') // 1. parametre istek sayısı 2.dakika. yani 4 dakikada 3 istek atabilir;
    ->name('contact.form');

Route::get('mekan/{slug}', [PlaceMenuController::class, 'index'])->name('place.show');
Route::get('table/{code}', [PlaceMenuController::class, 'table'])->name('table.show');
Route::middleware('checkPlace')->group(function (){
    Route::prefix("mekan/{slug}")->group(function (){
            Route::get('/anasayfa', [QrMenuController::class, 'index'])->name('menu.index');
            Route::post('/add-to-cart', [QrMenuController::class, 'addToCart'])->name('addToCart');
            Route::get('/get-cart', [QrMenuController::class, 'getCart'])->name('getCart');
            Route::get('/check-out', [QrMenuController::class, 'checkOut'])->name('menu.checkOut');
            Route::post('/empty-cart', [QrMenuController::class, 'emptyCart'])->name('emptyCart');
            Route::post('/order-create', [QrMenuController::class, 'orderCreate'])->name('order.create');
            Route::get('/order/{order}/detail', [QrMenuController::class, 'orderDetail'])->name('order.detail');
            Route::get('/order/search', [QrMenuController::class, 'orderSearchShow'])->name('orderSearchShow');
            Route::post('/order-search', [QrMenuController::class, 'orderSearch'])->name('order.search');
            Route::post('/call/vale', [QrMenuController::class, 'callVale'])->name('call.vale');
            Route::post('/call/taxi', [QrMenuController::class, 'callTaxi'])->name('call.taxi');
            Route::get('/call/waiter', [QrMenuController::class, 'callWaiter'])->name('call.waiter');
            Route::get('/call/account', [QrMenuController::class, 'callAccount'])->name('call.account');
            Route::get('/working-hours', [QrMenuController::class, 'workingHours'])->name('menu.workingHours');
            Route::get('/contracts', [QrMenuController::class, 'contracts'])->name('menu.contracts');
            Route::get('/contract/{contract_slug}', [QrMenuController::class, 'contractDetail'])->name('contract.detail');
            Route::get('/announcement', [QrMenuController::class, 'announcement'])->name('menu.announcement');
            Route::get('/suggestions', [QrMenuController::class, 'suggestion'])->name('menu.suggestion');
            Route::post('/suggestion/save', [QrMenuController::class, 'suggestionSave'])->name('menu.suggestion.post');
            Route::get('/category/{category}', [QrMenuController::class, 'category'])->name('category');
            Route::get('/product/{product}/detail', [QrMenuController::class, 'product'])->name('productDetail');
    });
    Route::get('/notify', [PlaceMenuController::class, 'notify'])->name('notify');
});

// Parola sıfırlama bağlantısı isteği
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Parola sıfırlama
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

Route::post('/packet/{package}/callback/{user}', [SubscribtionController::class, 'callback'])->name('business.subscribtion.payment.callback');

Route::middleware(['auth:web', 'twoFactor'])->group(function (){
    Route::post('cikis-yap', [HomeController::class, 'logout'])->name('business.logout');
    Route::get('/2FA-verification', [HomeController::class, 'twoFactorShow'])->name('business.twoFactor');
    Route::post('/2FA-verification', [HomeController::class, 'twoFactorSms'])->name('business.twoFactor.verify');
    Route::get('/2FA-verification-resend', [HomeController::class, 'resendCode'])
        ->name('business.twoFactor.resend')
        ->middleware('throttle:3,4'); // 1. parametre istek sayısı 2.dakika. yani 4 dakikada 3 istek atabilir;

    Route::get('/home', [HomeController::class, 'index'])->name('business.home');
    Route::get('/markAsAllReadNotification', [HomeController::class, 'markAsAllReadNotification'])->name('business.markAsAllReadNotification');

    Route::prefix('business')->as('business.')->group(function (){
        Route::resource('place', PlaceController::class);
        Route::prefix('place/{place}')->as('place.')->group(function (){
            Route::get('clone', [PlaceController::class, 'clonePlace'])->name('clone');
            Route::get('passive', [PlaceController::class, 'passive'])->name('passive');
            Route::get('active', [PlaceController::class, 'active'])->name('active');
            Route::get('todayReport', [PlaceController::class, 'todayReport'])->name('todayReport');

        });
        Route::resource('table', TableController::class);
        Route::resource('print', \App\Http\Controllers\PrintController::class);
        Route::resource('placeTemplate', \App\Http\Controllers\PlaceTemplateController::class);
        Route::resource('region', RegionController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('place-unit', PlaceUnitController::class);
        Route::prefix('menu/{menu}')->as('menu.')->group(function (){
            Route::get('status', [MenuController::class, 'statusView'])->name('status');
            Route::post('update/price', [MenuController::class, 'updatePrice'])->name('updatePrice');
            Route::get('pop-up-banner', [MenuController::class, 'popupView'])->name('popup');
            Route::get('use-menu', [MenuController::class, 'useMenu'])->name('useMenu');
            Route::get('update-pop-up-status', [MenuController::class, 'updatePopupStatus'])->name('updatePopupStatus');
            Route::post('update-up-banner', [MenuController::class, 'updatePopup'])->name('updatePopup');

            Route::get('menu-crypted', [MenuPasswordController::class, 'crytpedView'])->name('crytpedView');
            Route::get('update-password-status', [MenuPasswordController::class, 'updatePasswordStatus'])->name('updatePasswordStatus');
            Route::post('update-password', [MenuPasswordController::class, 'updatePassword'])->name('updatePassword');
        });
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
            Route::get('product/{id}/delete', [OrderController::class, 'deleteProduct'])->name('deleteProduct');
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

        Route::resource('souce', SouceController::class); //soslar
        Route::resource('material', MaterialController::class); //malzemeler
        Route::resource('announcement', AnnouncementController::class);
        Route::resource('contract', ContractController::class);
        Route::resource('suggestion', SuggestionController::class);
        Route::resource('suggestion-question', SuggestionQuestionController::class);

        Route::prefix('subscribtion')->as('subscribtion.')->group(function (){
            Route::get('/', [SubscribtionController::class, 'index'])->name('index');
            Route::get('/{slug}/satin-al', [SubscribtionController::class, 'payForm'])->name('payForm');
            Route::post('/{slug}/odeme-yap', [SubscribtionController::class, 'pay'])->name('pay');
            Route::get('/odeme-basarili', [SubscribtionController::class, 'success'])->name('payment.success');
            Route::get('/odeme-basarisiz', [SubscribtionController::class, 'fail'])->name('payment.fail');

        });
        Route::resource('menu-design', MenuDesignController::class);

        Route::prefix('ajax')->group(function (){
           Route::post('all-delete-object', [\App\Http\Controllers\AjaxController::class, 'allDelete']);
        });
    });
});

Route::prefix('admin')->as('admin.')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Admin\LoginController::class, 'showLoginForm']);
    Route::post('/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');

    Route::middleware(['auth:admin'])->group(function (){
        Route::get('/dashboard', [\App\Http\Controllers\Admin\LoginController::class, 'dashboard'])->name('dashboard');

        Route::resource('place', \App\Http\Controllers\Admin\PlaceController::class);
        Route::prefix('place/{place}')->as('place.')->group(function (){
            Route::get('clone', [\App\Http\Controllers\Admin\PlaceController::class, 'clonePlace'])->name('clone');
            Route::get('passive', [\App\Http\Controllers\Admin\PlaceController::class, 'passive'])->name('passive');
            Route::get('active', [\App\Http\Controllers\Admin\PlaceController::class, 'active'])->name('active');
            Route::get('todayReport', [\App\Http\Controllers\Admin\PlaceController::class, 'todayReport'])->name('todayReport');

        });

        Route::resource('blog', \App\Http\Controllers\BlogController::class);
        Route::resource('blogCategory', \App\Http\Controllers\BlogCategoryController::class);
        Route::resource('feature', \App\Http\Controllers\FeatureController::class);
        Route::resource('entegration', \App\Http\Controllers\EntegrationController::class);
        Route::resource('gallery', \App\Http\Controllers\GalleryController::class);
        Route::resource('partnership', \App\Http\Controllers\PartnershipRequestController::class);
        Route::resource('contact', \App\Http\Controllers\ContactRequestController::class);
        Route::resource('demoRequest', \App\Http\Controllers\DemoRequestController::class);
        Route::resource('package', \App\Http\Controllers\PackageController::class);
        Route::resource('page', \App\Http\Controllers\PageController::class);
        Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('allergen', \App\Http\Controllers\Admin\AllergenController::class);

        Route::prefix('mainpage')->as('mainpage.')->group(function (){
            Route::get('/', [\App\Http\Controllers\Admin\MainPageController::class, 'index'])->name('index');
            Route::get('/contact', [\App\Http\Controllers\Admin\MainPageController::class, 'contact'])->name('contact');
        });

        Route::prefix('ajax')->group(function (){
            Route::post('all-delete-object', [\App\Http\Controllers\AjaxController::class, 'allDelete']);
        });

        Route::get('setting', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('setting.index');
        Route::post('setting', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('setting.update');
    });
});

