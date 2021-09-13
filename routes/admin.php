<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],function(){
        Route::middleware(['auth','isadmin'])->prefix('admin')->group(function(){
            Route::get('/',[DashboardController::class,'index'])->name('dashboard');
            // Route::resource([
            //     'user' => UserController::class,
            //     'role' => RoleController::class,
            //     'post' => PostController::class
            // ]);
            Route::resource('user',UserController::class);
            Route::resource('role',RoleController::class);
            Route::resource('post',PostController::class);
            Route::get('user/{posts}',[UserController::class,'post'])->name('user.post');
        });
});
