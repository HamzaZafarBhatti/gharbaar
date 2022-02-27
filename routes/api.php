<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BloggerLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/admin/login', [AdminLoginController::class, 'adminLogin'])->name('api.admin.login');
Route::post('/user/login', [UserLoginController::class, 'userLogin'])->name('api.user.login');
Route::post('/blogger/login', [BloggerLoginController::class, 'bloggerLogin'])->name('api.blogger.login');

Route::prefix('admin')->name('api.')->middleware(['auth:admin-api','scopes:admin'])->group(function() {
    Route::get('/get/users', [UserController::class, 'getAllUsers'])->name('get.allUsers');
    Route::post('/create/user', [UserController::class, 'createUser'])->name('create.user');
});