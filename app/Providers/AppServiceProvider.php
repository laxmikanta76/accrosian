<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Share settings globally with all views
        View::composer('*', function ($view) {
            try {
                $setting = cache()->remember('site_setting', 3600, fn() => Setting::first());
                $view->with('setting', $setting);
            } catch (\Exception $e) {
                $view->with('setting', null);
            }
        });
    }
}
