<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\MainUserController;

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

Route::group(['prefix' => 'admin'], function(){
    Route::match(['get','post'],'/login',[AdminController::class, 'login'])->name('admin.login');
    Route::group(['middleware'=>['admin']], function(){
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/user/view', [MainUserController::class, 'UserView'])->name('user.view');
        Route::get('/user/add', [MainUserController::class, 'UserAdd'])->name('user.add');
        Route::post('/user/store', [MainUserController::class, 'UserStore'])->name('user.store');
        Route::get('/user/edit/{id}', [MainUserController::class, 'UserEdit'])->name('user.edit');
        Route::post('/user/update/{id}', [MainUserController::class, 'UserUpdate'])->name('user.update');
        Route::get('/edit/{id}', [MainUserController::class, 'AdminEdit'])->name('admin.edit');
        Route::post('/update/{id}', [MainUserController::class, 'AdminUpdate'])->name('admin.update');
        Route::get('/user/delete/{id}', [MainUserController::class, 'UserDelete'])->name('user.delete');
        Route::get('/delete/{id}', [MainUserController::class, 'AdminDelete'])->name('admin.delete');
        Route::get('/logout', [AdminController::class, 'logout']);

    });
});

Route::group(['prefix' => 'user'],function(){
    Route::match(['get','post'],'/login',[UserController::class, 'login'])->name('user.login');
    Route::group(['middleware'=>['user']], function(){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        //Route::get('/logout', [AdminController::class, 'logout']);
    });
});