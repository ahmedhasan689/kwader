<?php

namespace App\Providers;

use App\Models\Employer;
use App\Repositories\Employee\EmployeeInterface;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Employee_Settings\EmployeeSettingsInterface;
use App\Repositories\Employee_Settings\EmployeeSettingsRepository;
use App\Repositories\Employer_Settings\EmployerSettingsInterface;
use App\Repositories\Employer_Settings\EmployerSettingsRepository;
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

        $this->app->bind(EmployerSettingsInterface::class, function($app) {
            return new EmployerSettingsRepository();
        });

        $this->app->bind(EmployeeSettingsInterface::class, function($app) {
            return new EmployeeSettingsRepository();
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
