<?php

namespace App\Providers;

use App\Repositories\Employee\EmployeeInterface;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Job\JobInterface;
use App\Repositories\Job\JobRepository;
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

        $this->app->bind(JobInterface::class, function($app) {
            return new JobRepository();
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
