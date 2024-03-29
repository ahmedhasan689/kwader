<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\Contract\ContractController;
use App\Http\Controllers\Employee\EmployeeSettingsController;
use App\Http\Controllers\Employer\CompanyController;
use App\Http\Controllers\Employer\ContactController;
use App\Http\Controllers\Employer\EmployerController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employer\EmployerFavoriteController;
use App\Http\Controllers\Employer\EmployerSettingsController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\Financial\PaypalController;
use App\Http\Controllers\Financial\StripeController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\Pages\PagesController;
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
})->name('homepage');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';

//Route::redirect('/login', '/', 302);


// Start Social Media Route ( Login & Register )
//Route::namespace('/Social_Media')
//    ->group(function () {
//        // Start Google Auth
//        Route::group([
//            'prefix' => 'google',
//            'as' => 'google.'
//        ], function() {
//            Route::get('/redirect', [GoogleController::class, 'redirect'])->name('redirect');
//            Route::get('/callback', [GoogleController::class, 'callback'])->name('callback');
//        });
//        // End Google Auth
//
//        // Start Facebook Auth
//        Route::group([
//            'prefix' => 'facebook',
//            'as' => 'facebook.'
//        ], function() {
//            Route::get('/redirect', [FacebookController::class, 'redirect'])->name('redirect');
//            Route::get('/callback', [FacebookController::class, 'callback'])->name('callback');
//        });
//        // End Facebook Auth
//    });
// End Social Media Route ( Login & Register )

// Start Home Pages Controller
Route::namespace('/Pages')
    ->prefix('/page')
    ->middleware(['guest'])
    ->group(function() {

        Route::group([
           'as' => 'page.',
        ], function() {
            Route::get('/how_to', [PagesController::class, 'howTo'])->name('howTo');
            Route::get('/terms', [PagesController::class, 'terms'])->name('terms');
            Route::get('/brief', [PagesController::class, 'whom'])->name('whom');
            Route::get('/subscriptions', [PagesController::class, 'subscriptions'])->name('subscriptions');
            Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
            Route::get('/contact_us', [PagesController::class, 'contactUs'])->name('contactUs');
        });

    });
// End Home Pages Controller

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
        ->middleware(['auth', 'employer'])
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

            // Start Job Route
            Route::group([
                'prefix' => 'job',
                'as' => 'job.',
            ], function() {
                Route::get('/my_jobs', [JobController::class, 'myJobs'])->name('myJobs');
                Route::get('/', [JobController::class, 'index'])->name('index')->withoutMiddleware(['employer']);
                Route::get('/create/{step}', [JobController::class, 'create'])->name('create');
                Route::post('/store/{step}', [JobController::class, 'store'])->name('store');
                Route::get('/{slug}', [JobController::class, 'show'])->name('show')->withoutMiddleware(['employer']);
                Route::put('/{id}', [JobController::class, 'update'])->name('update')->withoutMiddleware(['employer']);
                Route::delete('/{id}', [JobController::class, 'destroy'])->name('delete');
            });
            // End Job Route

            // Start Settings Route
            Route::group([
                'prefix' => 'settings',
                'as' => 'employer.settings.',
            ], function() {
                Route::get('/{id}', [EmployerSettingsController::class, 'index'])->name('index');
                Route::put('/setNames', [EmployerSettingsController::class, 'setNames'])->name('setNames');
                Route::put('/setAvatar', [EmployerSettingsController::class, 'setAvatar'])->name('setAvatar');
                Route::put('/setInfo', [EmployerSettingsController::class, 'setInfo'])->name('setInfo');
                Route::put('/setEmail', [EmployerSettingsController::class, 'setEmail'])->name('setEmail');
                Route::put('/resetPassword', [EmployerSettingsController::class, 'resetPassword'])->name('resetPassword');
                Route::put('/setPhoneNumber', [EmployerSettingsController::class, 'setPhoneNumber'])->name('setPhoneNumber');
                Route::delete('/deleteAccount', [EmployerSettingsController::class, 'deleteAccount'])->name('deleteAccount');
                Route::post('/notificationSystem', [EmployerSettingsController::class, 'notificationSystem'])->name('notificationSystem');
            });
            // End Job Route

            // Start Employer Favorite Route
            Route::group([
                'prefix' => 'existing',
                'as' => 'employer.existing.',
            ], function() {
                Route::get('/{id}', [EmployerFavoriteController::class, 'index'])->name('index');
                Route::post('/', [EmployerFavoriteController::class, 'store'])->name('store');
                Route::get('/show/{id}', [EmployerFavoriteController::class, 'show'])->name('show');
                Route::post('/favorite', [EmployerFavoriteController::class, 'favoriteStore'])->name('favoriteStore');
                Route::post('/modalStore', [EmployerFavoriteController::class, 'modalStore'])->name('modalStore');
                Route::post('/newList', [EmployerFavoriteController::class, 'newList'])->name('newList');
            });
            // End Employer Favorite Route

            // For Search In Job-Index Page
            Route::post('/search', [JobController::class, 'search'])->name('search');
            // End Job Route

            // Start Find Employee Page
            Route::get('/find_employee', [EmployerController::class, 'find_employee'])->name('find_employee');
            // End Find Employee Page
        });

Route::namespace('/Employee')
    ->prefix('/employee')
    ->middleware(['auth', 'employee'])
    ->group(function() {


        // Start Employee Profile_Create Route [ Two Steps before dashboard => EmployeeRepository ]
        Route::group([
            'prefix' => 'profile',
            'as' => 'profile.',
        ], function() {
            Route::get('/specialization', [EmployeeController::class, 'specialization'])->name('specialization');
            Route::get('/getSpecializationByName/{name}', [EmployeeController::class, 'getSpecializationByName'])->withoutMiddleware(['employee'])->name('getSpecializationByName');
            Route::get('/getSpecializationById/{id}', [EmployeeController::class, 'getSpecializationById'])->withoutMiddleware(['employee'])->name('getSpecializationById');
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
            Route::get('/show/{id}', [EmployeeController::class, 'show'])->name('show')->withoutMiddleware(['employee']);
            Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('edit');
            Route::put('/edit_info/{id}', [EmployeeController::class, 'editInfo'])->name('editInfo');
            Route::put('/edit_salary/{id}', [EmployeeController::class, 'editSalary'])->name('editSalary');
            Route::put('/edit_availability/{id}', [EmployeeController::class, 'editAvailability'])->name('editAvailability');
            Route::put('/edit_bio/{id}', [EmployeeController::class, 'editBio'])->name('editBio');
            Route::put('/personal_tap/{id}', [EmployeeController::class, 'personalTap'])->name('personalTap');
            Route::post('/practicalExperience', [EmployeeController::class, 'practicalExperience'])->name('practicalExperience');
            Route::post('/education', [EmployeeController::class, 'education'])->name('education');
            Route::post('/certification', [EmployeeController::class, 'certification'])->name('certification');
            Route::post('/setSkills', [EmployeeController::class, 'setSkills'])->name('setSkills');
            Route::post('/setlanguages', [EmployeeController::class, 'setlanguages'])->name('setlanguages');
            Route::post('/addCV', [EmployeeController::class, 'addCV'])->name('addCV');
            Route::put('/changeAvatar/{id}', [EmployeeController::class, 'changeAvatar'])->name('changeAvatar');
        });
        // End Employee Dashboard Route

        // Start Employee Settings Route
        Route::group([
            'prefix' => 'settings',
            'as' => 'employee.settings.',
        ], function() {
            Route::get('/{id}', [EmployeeSettingsController::class, 'index'])->name('index');
            Route::put('/setNames', [EmployeeSettingsController::class, 'setNames'])->name('setNames');
            Route::put('/setAvatar', [EmployeeSettingsController::class, 'setAvatar'])->name('setAvatar');
            Route::put('/setInfo', [EmployeeSettingsController::class, 'setInfo'])->name('setInfo');
            Route::put('/setEmail', [EmployeeSettingsController::class, 'setEmail'])->name('setEmail');
            Route::put('/resetPassword', [EmployeeSettingsController::class, 'resetPassword'])->name('resetPassword');
            Route::put('/setPhoneNumber', [EmployeeSettingsController::class, 'setPhoneNumber'])->name('setPhoneNumber');
            Route::delete('/deleteAccount', [EmployeeSettingsController::class, 'deleteAccount'])->name('deleteAccount');
        });
        // End Employee Settings Route
    });

Route::namespace('/Financial')
    ->prefix('/financial')
    ->middleware(['auth'])
    ->group(function() {

        // Start Financial Route
        Route::group([
            'as' => 'financial.',
        ], function() {
            // Paypal
            Route::get('/payment/{total}/create', [PaypalController::class, 'CreatePayment'])->name('CreatePayment');
            Route::get('/payment/callback', [PaypalController::class, 'callback'])->name('CallbackPayment');
            Route::get('/payment/cancel', [PaypalController::class, 'cancel'])->name('CancelPayment');

            // Stripe
            Route::get('/stripe', [StripeController::class, 'create'])->name('CreateStripe');
            Route::post('/stripe', [StripeController::class, 'store'])->name('StoreStripe');
        });
        // End Financial Route
    });

Route::get('notification/show/{id}', [NotificationController::class, 'show'])->name('notification.show');

// Start Contract And Financial
Route::namespace('/Contract')
    ->prefix('/contract')
    ->middleware(['auth'])
    ->group(function() {

        // Start Contract Route
        Route::group([
            'as' => 'contract.',
        ], function() {
            Route::get('/', [ContractController::class, 'index'])->name('index');
            Route::get('/create/{job}/{employee}', [ContractController::class, 'create'])->name('create');
            Route::post('/{job}/{employee}', [ContractController::class, 'store'])->name('store');
            Route::get('/{id}', [ContractController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [ContractController::class, 'show'])->name('edit');
            Route::put('/{id}', [ContractController::class, 'update'])->name('update');
            Route::delete('/{id}', [ContractController::class, 'destroy'])->name('delete');

            // Total Salary
            Route::post('/totalSalary', [ContractController::class, 'totalSalary'])->name('total');
        });
        //
    });
// End Contract And Financial

// Start Contract And Financial
Route::namespace('/Chat')
    ->prefix('/chat')
    ->middleware(['auth'])
    ->group(function() {

        // Start Contract Route
        Route::group([
            'as' => 'chat.',
        ], function() {
            Route::get('/', [ChatController::class, 'index'])->name('index');
            Route::get('/{slug}/{employee}', [ChatController::class, 'create'])->name('create');
        });
        //
    });
// End Contract And Financial
