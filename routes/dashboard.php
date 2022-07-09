<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EmployeeDashboardController;
use App\Http\Controllers\Dashboard\EmployerDashboardController;
use App\Http\Controllers\Dashboard\JobDashboardController;
use Illuminate\Support\Facades\Route;

// Start Dashboard Controller
Route::namespace('/Dashboard')
    ->prefix('/admin')
    ->middleware(['auth'])
    ->group(function() {

        // Index Page ( Dashboard )
        Route::group([
            'prefix' => 'dashboard',
            'as' => 'admin.dashboard.',
        ], function() {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });
        // End Index Page

        // Start Employee Pages
        Route::group([
            'prefix' => 'employee',
            'as' => 'admin.employee.'
        ], function() {
            // For Soft Delete
            Route::get('/trash', [EmployeeDashboardController::class, 'trash'])->name('trash');
            Route::put('/restore/{id?}', [EmployeeDashboardController::class, 'restore'])->name('restore');
            Route::delete('/force_delete/{id?}', [EmployeeDashboardController::class, 'forceDelete'])->name('force-delete');

            // Normal Function
            Route::get('/', [EmployeeDashboardController::class, 'index'])->name('index');
            Route::get('/create', [EmployeeDashboardController::class, 'create'])->name('create');
            Route::post('/', [EmployeeDashboardController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [EmployeeDashboardController::class, 'edit'])->name('edit');
            Route::put('/{id}', [EmployeeDashboardController::class, 'update'])->name('update');
            Route::delete('/{id}', [EmployeeDashboardController::class, 'destroy'])->name('delete');


        });
        // End Employee Pages

        // Start Employer Pages
        Route::group([
            'prefix' => 'employer',
            'as' => 'admin.employer.'
        ], function() {
            Route::get('/', [EmployerDashboardController::class, 'index'])->name('index');
            Route::get('/create', [EmployerDashboardController::class, 'create'])->name('create');
            Route::post('/', [EmployerDashboardController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [EmployerDashboardController::class, 'edit'])->name('edit');
            Route::put('/{id}', [EmployerDashboardController::class, 'update'])->name('update');
            Route::delete('/{id}', [EmployerDashboardController::class, 'destroy'])->name('delete');

            // For Soft Delete
            Route::get('/trash', [EmployerDashboardController::class, 'trash'])->name('trash');
            Route::put('/restore/{id?}', [EmployerDashboardController::class, 'restore'])->name('restore');
            Route::delete('/force_delete/{id?}', [EmployerDashboardController::class, 'forceDelete'])->name('force-delete');
        });
        // End Employer Pages

        // Start Job Pages
        Route::group([
            'prefix' => 'job',
            'as' => 'admin.job.'
        ], function() {
            Route::get('/{status}', [JobDashboardController::class, 'index'])->name('index');
            Route::get('/create', [JobDashboardController::class, 'create'])->name('create');
            Route::post('/', [JobDashboardController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [JobDashboardController::class, 'edit'])->name('edit');
            Route::put('/{id}', [JobDashboardController::class, 'update'])->name('update');
            Route::delete('/{id}', [JobDashboardController::class, 'destroy'])->name('delete');

            // For Soft Delete
            Route::get('/trash', [JobDashboardController::class, 'trash'])->name('trash');
            Route::put('/restore/{id?}', [JobDashboardController::class, 'restore'])->name('restore');
            Route::delete('/force_delete/{id?}', [JobDashboardController::class, 'forceDelete'])->name('force-delete');

            // For Accept
            Route::put('/accept/{id}', [JobDashboardController::class, 'accept'])->name('accept');
        });
        // End Job Pages
    });

// End Dashboard Controller
