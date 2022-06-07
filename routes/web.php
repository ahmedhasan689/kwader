<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EmployeeDashboardController;
use App\Http\Controllers\Employer\CompanyController;
use App\Http\Controllers\Employer\ContactController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Social_Media\FacebookController;
use App\Http\Controllers\Social_Media\GoogleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

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
            'as' => 'employee.'
        ], function() {
            Route::get('/', [EmployeeDashboardController::class, 'index'])->name('index');
            Route::get('/create', [EmployeeDashboardController::class, 'create'])->name('create');
            Route::post('/', [EmployeeDashboardController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [EmployeeDashboardController::class, 'edit'])->name('edit');
            Route::put('/{id}', [EmployeeDashboardController::class, 'update'])->name('update');
            Route::delete('/{id}', [EmployeeDashboardController::class, 'destroy'])->name('delete');
        });
        // End Employee Pages
    });

// End Dashboard Controller

// Start Social Media Route ( Login & Register )
Route::namespace('/Social_Media')
    ->group(function () {
        // Start Google Auth
        Route::group([
            'prefix' => 'google',
            'as' => 'google.'
        ], function() {
            Route::get('/redirect', [GoogleController::class, 'redirect'])->name('redirect');
            Route::get('/callback', [GoogleController::class, 'callback'])->name('callback');
        });
        // End Google Auth

        // Start Facebook Auth
        Route::group([
            'prefix' => 'facebook',
            'as' => 'facebook.'
        ], function() {
            Route::get('/redirect', [FacebookController::class, 'redirect'])->name('redirect');
            Route::get('/callback', [FacebookController::class, 'callback'])->name('callback');
        });
        // End Facebook Auth
    });
// End Social Media Route ( Login & Register )

// Register Choice Account Type
Route::namespace('/Employer')
    ->prefix('/employer')
    ->middleware(['guest'])
    ->group(function() {
        Route::group([
            'prefix' => 'dashboard',
            'as' => 'dashboard.',
        ], function() {
            Route::get('/account/{type}', [EmployerController::class, 'accountType'])->name('account_type');
        });
    });


Route::namespace('/Employer')
        ->prefix('/employer')
        ->middleware(['auth'])
        ->group(function() {

            // Start Employer Dashboard
            Route::group([
                'prefix' => 'dashboard',
                'as' => 'employer.dashboard.',
            ], function() {
                Route::get('/', [EmployerController::class, 'index'])->name('index');
            });
            // End Employer Dashboard

            // Start Company Route
            Route::group([
               'prefix' => 'my_company',
               'as' => 'company.',
            ], function() {
                Route::get('/', [CompanyController::class, 'index'])->name('index');
                Route::get('/create', [CompanyController::class, 'create'])->name('create');
                Route::post('/', [CompanyController::class, 'store'])->name('store');
            });
            // End Company Route

            // Start Contact Route
            Route::group([
                'prefix' => 'contact',
                'as' => 'contact.',
            ], function() {
                Route::put('/', [ContactController::class, 'update'])->name('update');
            });
            // End Contact Route
        });

Route::namespace('/Employee')
    ->prefix('/employee')
    ->middleware(['auth'])
    ->group(function() {

        // Start Employee Dashboard Route
        Route::group([
            'prefix' => 'dashboard',
            'as' => 'dashboard.',
        ], function() {
            Route::get('/', [EmployeeController::class, 'index'])->name('index');
        });
        // End Employee Dashboard Route
    });

