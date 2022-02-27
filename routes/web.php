<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\BloggerDashboardController;
use App\Http\Controllers\BloggerLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserLoginController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/api/testing', [App\Http\Controllers\HomeController::class, 'apiTesting'])->name('api.testing');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [AdminLoginController::class, 'doLogin'])->name('login');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class);
        Route::resource('bloggers', BloggerController::class);
    });
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/login', [UserLoginController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [UserLoginController::class, 'doLogin'])->name('login');
    Route::middleware('auth:user')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::resource('bloggers', BloggerController::class);
    });
});

Route::prefix('blogger')->name('blogger.')->group(function () {
    Route::get('/login', [BloggerLoginController::class, 'showLogin'])->name('showLogin');
    Route::post('/login', [BloggerLoginController::class, 'doLogin'])->name('login');
    Route::middleware('auth:blogger')->group(function () {
        Route::get('/dashboard', [BloggerDashboardController::class, 'index'])->name('dashboard');
        Route::resource('blogs', BlogController::class);
    });
});
