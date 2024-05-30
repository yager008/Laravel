<?php

namespace App\Providers;

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
        $this->app['request']->setTrustedHosts([
            'example.com',            // Add your main domain
            'www.example.com',        // Add the www version of your domain if applicable
            'subdomain.example.com',  // Add any subdomains if needed
            '127.0.0.1',
        ]);
    }
}
