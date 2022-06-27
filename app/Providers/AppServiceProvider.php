<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use PaypalPayoutsSDK\Core\PayPalHttpClient;
use PaypalPayoutsSDK\Core\SandboxEnvironment;
use PaypalPayoutsSDK\Core\ProductionEnvironment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('paypal.client', function($app) {
            $config = config('services.paypal');

            if ($config['mode'] == 'sandbox') {
                $environment = new SandboxEnvironment($config['client_id'], $config['client_secret']);
            }else{
                $environment = new ProductionEnvironment($config['client_id'], $config['client_secret']);
            }
            $client = new PayPalHttpClient($environment);
            return $client;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // To Use Bootstrap Not Tailwindcss
        Paginator::useBootstrap();

//        $this->app->bind('paypal.client', function($app) {
//            $config = config('services.paypal');
//
//            if ($config['mode'] == 'sandbox') {
//                $environment = new SandboxEnvironment($config['client_id'], $config['client_secret']);
//            }else{
//                $environment = new ProductionEnvironment($config['client_id'], $config['client_secret']);
//            }
//            $client = new PayPalHttpClient($environment);
//            return $client;
//        });
    }
}
