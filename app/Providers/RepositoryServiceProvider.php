<?php

namespace App\Providers;

use App\Repositories\Employee\EmployeeInterface;
use App\Repositories\Employee\EmployeeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeInterface::class, function($app) {
            return new EmployeeRepository();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
