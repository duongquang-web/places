<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and routes.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // 🌐 Routes API
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // 🌍 Routes web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
