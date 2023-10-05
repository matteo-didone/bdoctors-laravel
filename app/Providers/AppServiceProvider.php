<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'nncd4p6c7qk3248q',
                    'publicKey' => 'bwhftq43kqy8ysy2',
                    'privateKey' => '06ff7e924e40a90190b7315c009d3396'
                ]
            );
        });
    }
}
