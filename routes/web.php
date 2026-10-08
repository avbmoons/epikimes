<?php

use App\Http\Controllers\Admin\StartController as AdminStartController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\CatalogController as AdminCatalogController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\MailsController as AdminMailsController;
use App\Http\Controllers\Admin\NotificationsController as AdminNotificationsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AboutController;

use Illuminate\Support\Facades\Route;

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
    Route::resource('home', AdminHomeController::class);
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('catalog', AdminCatalogController::class);
    Route::resource('about', AdminAboutController::class);
    Route::resource('users', AdminUsersController::class);
    Route::resource('mails', AdminMailsController::class);
    Route::resource('notifications', AdminNotificationsController::class);
});

Route::group(['prefix' => ''], static function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
});
