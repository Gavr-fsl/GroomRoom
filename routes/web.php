<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginPost']);
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerPost']);

Route::middleware('auth')->group(function () {
    Route::get('/account', [UserController::class, 'account'])->name('account');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/account/delete/{id}', [ApplicationController::class, 'delete'])->name('delete');

    Route::middleware('role:1')->group(function (){
        Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
        Route::get('/categories', [AdminController::class, 'editCategory'])->name('categories');
        Route::post('/categories', [AdminController::class, 'editCategoryPost']);
    });

    Route::prefix('application')->group(function (){
        Route::get('/',[ApplicationController::class, 'createApp'])->name('application.create');
        Route::post('/',[ApplicationController::class, 'createAppPost']);
    });

});
