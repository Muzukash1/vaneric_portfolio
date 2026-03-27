<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Force HTTPS in production (Render sits behind a TLS-terminating proxy)
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}