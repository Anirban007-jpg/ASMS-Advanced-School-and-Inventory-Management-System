<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\MainUserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\StudentController;

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
        Route::get('/profile/view', [ProfileController::class, 'AdminProfileView'])->name('profile.view');
        Route::get('/profile/edit', [ProfileController::class, 'AdminProfileEdit'])->name('profile.edit');
        Route::get('/password/change', [ProfileController::class, 'PasswordChange'])->name('password.change');
        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
        Route::post('/profile/update', [ProfileController::class, 'AdminProfileUpdate'])->name('profile.update');
        Route::get('/student/class/view', [StudentController::class, 'ViewStudentClass'])->name('student.class.view');
        Route::get('/student/class/add', [StudentController::class, 'AddStudentClass'])->name('student.class.add');
        Route::post('/student/class/store', [StudentController::class, 'StoreStudentClass'])->name('student.class.store');
        Route::get('/student/class/delete/{id}', [StudentController::class, 'DeleteStudentClass'])->name('student.class.delete');
        Route::get('/student/year/view', [StudentController::class, 'ViewStudentYear'])->name('student.year.view');
        Route::get('/student/year/add', [StudentController::class, 'AddStudentYear'])->name('student.year.add');
        Route::post('/student/year/store', [StudentController::class, 'StoreStudentYear'])->name('student.year.store');
        Route::get('/student/year/edit/{id}', [StudentController::class, 'EditStudentYear'])->name('student.year.edit');
        Route::post('/student/year/update/{id}', [StudentController::class, 'UpdateStudentYear'])->name('student.year.update');
        Route::get('/student/year/delete/{id}', [StudentController::class, 'DeleteStudentYear'])->name('student.year.delete');
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