<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Catalogs\RolesController;
use App\Http\Controllers\Catalogs\UsersController;
use App\Http\Controllers\Catalogs\PermissionsController;

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

Auth::routes();

Route::group(['middleware' => ['auth', 'cerberus']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index.index');
    Route::get('help', [HelpController::class, 'index'])->name('help');

    Route::prefix('catalogs')->name('catalogs.')->group(function () {
        Route::resource('users', UsersController::class);
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });
});
