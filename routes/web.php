<?php

use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employee\EmployeeController;
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

Route::namespace('/Employer')
        ->prefix('/employer')
        ->middleware(['auth'])
        ->group(function() {
            Route::group([
                'prefix' => 'dashboard',
                'as' => 'dashboard.',
            ], function() {
                Route::get('/', [EmployerController::class, 'index'])->name('index');
                Route::get('/account/{type}', [EmployerController::class, 'accountType'])->name('account_type');
//                Route::get('/account/{type}', [EmployerController::class, 'accountType'])->name('account_type');
            });
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

