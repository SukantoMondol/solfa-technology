<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Share site settings and active services with every view (safe even before migrations run).
        View::composer('*', function ($view) {
            $settings = [];
            $services = [];

            try {
                if (Schema::hasTable('settings')) {
                    $settings = Setting::pluck('value', 'key')->toArray();
                }
                if (Schema::hasTable('services')) {
                    $services = \App\Models\Service::active()->get();
                }
            } catch (\Throwable $e) {
                // Database not ready yet (e.g. during install) - ignore.
            }

            $view->with('site', $settings);
            $view->with('headerServices', $services);
        });
    }
}
