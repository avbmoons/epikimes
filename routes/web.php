<?php

use App\Http\Controllers\Admin\StartController as AdminStartController;
use App\Http\Controllers\Admin\PageElementsController as AdminPageElementsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\CatalogController as AdminCatalogController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\MailsController as AdminMailsController;
use App\Http\Controllers\Admin\NotificationsController as AdminNotificationsController;
use App\Http\Controllers\Admin\ColorsController as AdminColorsController;
use App\Http\Controllers\Admin\ImagesCleanerController as AdminImagesCleanerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MailController;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home.index');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::resource('/', AdminStartController::class)->names(['index' => 'index',]);
    Route::resource('elements', AdminPageElementsController::class);
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('catalog', AdminCatalogController::class);
    Route::resource('about', AdminAboutController::class);
    Route::resource('users', AdminUsersController::class);
    Route::resource('mails', AdminMailsController::class);
    Route::post('notifications/bulk-destroy', [AdminNotificationsController::class, 'bulkDestroy'])
            ->name('notifications.bulk-destroy');
    Route::resource('notifications', AdminNotificationsController::class);
            // ->only(['index', 'destroy']);
    Route::resource('colors', AdminColorsController::class);
    Route::resource('images-cleaner', AdminImagesCleanerController::class);
});

Route::group(['prefix' => ''], static function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
        Route::get('/catalog/one/{id}', [CatalogController::class, 'show'])
            ->where(name: 'id', expression: '\d+')->name("itemId");
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::resource('/mail', MailController::class)->names([
        'create' => 'mail.create',
        'store' => 'mail.store',
    ]);
});

Route::get('/test-welcome', function () {
    try {
       $user = User::first() ?? User::factory()->make([
        'name' => 'Ivan Ivanov', 
        'email' => 'ivanov@example.com']);
        
       $user->notify(new WelcomeNotification()); 

       return 'Welcome mail was sending to Mailpit!';
    }  catch (\Exception $e) {
        return response()->json([
            'error' => 'Error mail sending',
            'message' => $e->getMessage()
        ]);
    }

    

    
});
