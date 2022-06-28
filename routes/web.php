<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EmployeeDashboardController;
use App\Http\Controllers\Dashboard\EmployerDashboardController;
use App\Http\Controllers\Dashboard\JobDashboardController;
use App\Http\Controllers\Employer\CompanyController;
use App\Http\Controllers\Employer\ContactController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\Financial\PaypalController;
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
                Route::get('/{id?}', [EmployerController::class, 'index'])->name('index');
                Route::get('/{id}', [EmployerController::class, 'index'])->name('show');
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

            //Start Job Route
            Route::group([
                'prefix' => 'job',
                'as' => 'job.',
            ], function() {
                Route::get('/', [JobController::class, 'index'])->name('index');
                Route::get('/create/{step}', [JobController::class, 'create'])->name('create');
                Route::post('/store/{step}', [JobController::class, 'store'])->name('store');
            });
                // For Search In Job-Index Page
                Route::post('/search/{salary?}/{years?}', [JobController::class, 'search'])->name('search');
            //Start Job Route
        });

Route::namespace('/Employee')
    ->prefix('/employee')
    ->middleware(['auth'])
    ->group(function() {


        // Start Employee Profile_Create Route [ Two Steps before dashboard => EmployeeRepository ]
        Route::group([
            'prefix' => 'profile',
            'as' => 'profile.',
        ], function() {
            Route::get('/specialization', [EmployeeController::class, 'specialization'])->name('specialization');
            Route::get('/getSpecializationByName/{name}', [EmployeeController::class, 'getSpecializationByName'])->name('getSpecializationByName');
            Route::get('/getSpecializationById/{id}', [EmployeeController::class, 'getSpecializationById'])->name('getSpecializationById');
            Route::post('/updateField', [EmployeeController::class, 'updateField'])->name('updateField');
            Route::get('/profile_information', [EmployeeController::class, 'profileInfo'])->name('profileInfo');
            Route::get('/getFlag/{id}', [EmployeeController::class, 'getFlag'])->name('getFlag');
            Route::post('/setInformation', [EmployeeController::class, 'setInformation'])->name('set-information');
        });
        // End Employee Profile_Create Route [ Two Steps before dashboard => EmployeeRepository ]

        // Start Employee Dashboard Route
        Route::group([
            'prefix' => 'dashboard',
            'as' => 'employee.dashboard.',
        ], function() {
            Route::get('/{id?}', [EmployeeController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
            Route::put('/edit_info/{id}', [EmployeeController::class, 'editInfo'])->name('editInfo');
            Route::put('/edit_salary/{id}', [EmployeeController::class, 'editSalary'])->name('editSalary');
            Route::put('/edit_availability/{id}', [EmployeeController::class, 'editAvailability'])->name('editAvailability');
            Route::put('/edit_bio/{id}', [EmployeeController::class, 'editBio'])->name('editBio');
            Route::put('/personal_tap/{id}', [EmployeeController::class, 'personalTap'])->name('personalTap');
            Route::post('/practicalExperience', [EmployeeController::class, 'practicalExperience'])->name('practicalExperience');
        });
        // End Employee Dashboard Route
    });

Route::namespace('/Financial')
    ->prefix('/financial')
    ->middleware(['auth'])
    ->group(function() {

        // Start Financial Route
        Route::group([
            'as' => 'financial.',
        ], function() {
            Route::get('/payout', [PaypalController::class, 'CreatePayout'])->name('CreatePayout');
        });
        // End Financial Route

    });
