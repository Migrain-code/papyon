<?php

namespace App\Providers;

use App\Core\CustomResourceRegistrar;
use App\Models\Cart;
use App\Models\City;
use App\Models\Place;
use App\Models\Setting;
use App\Models\Table;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
        $registrar = new CustomResourceRegistrar($this->app['router']);
        foreach (Setting::all() as $item) {
            $settings[$item->name] = $item->value;
        }

        \Config::set('settings', $settings);
        $this->app->bind('Illuminate\Routing\ResourceRegistrar', function () use ($registrar) {
            return $registrar;
        });
    }
}
