<?php

use App\Http\Controllers\backend\activity\ActivityController;
use App\Http\Controllers\backend\auth\AuthController;
use App\Http\Controllers\backend\education\EducationController;
use App\Http\Controllers\backend\kys\KyscategoryController;
use App\Http\Controllers\backend\kys\KysKodeController;
use App\Http\Controllers\backend\project\ProjectController;
use App\Http\Controllers\backend\sks\SksController;
use App\Http\Controllers\backend\user\UserController;

use Illuminate\Support\Facades\Route;


Route::get('/',[AuthController::class,'login'])->name('auth.login');
Route::post('/login-submit',[AuthController::class,'login_submit'])->name('auth.login-submit');
Route::get('/reset-password',[AuthController::class,'reset_password_page'])->name('auth.reset_password');
Route::post('/reset-password-link',[AuthController::class,'reset_password_link'])->name('auth.reset-password-link');
Route::get('/admin/reset-password/{token}/{email}',[AuthController::class,'reset_password'])->name('auth.reset_password_link');
Route::post('/reset-password-submit',[AuthController::class,'reset_password_submit'])->name('auth.reset_password_submit');


Route::middleware('auth')->group(function (){
    Route::prefix('dashboard')->group(function(){
        Route::get('/',[AuthController::class,'index'])->name('auth.index');
        Route::get('/logout',[AuthController::class,'logout'])->name('auth.logout');


        Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
        Route::post('/profile/profile-image-update',[UserController::class,'profile_image_update'])->name('users.profile.image.update');
        Route::post('/profile/profile-information-update',[UserController::class,'profile_information_update'])->name('users.profile.information.update');
        Route::post('/profile/profile-password-update',[UserController::class,'profile_password_update'])->name('users.profile.password.update');

        Route::get('/users/create',[UserController::class,'create'])->name('users.create')->middleware('isRole');
        Route::post('/users/store',[UserController::class,'store'])->name('users.store')->middleware('isRole');
        Route::get('/users/index',[UserController::class,'index'])->name('users.index')->middleware('isRole');
        Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete')->middleware('isRole');
        Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit')->middleware('isRole');
        Route::post('/user/image-update',[UserController::class,'image_update'])->name('users.image.update')->middleware('isRole');
        Route::post('/user/information-update',[UserController::class,'information_update'])->name('users.information.update')->middleware('isRole');
        Route::post('/user/password-update',[UserController::class,'password_update'])->name('users.password.update')->middleware('isRole');



        Route::get('/kys-code/index',[KysKodeController::class,'index'])->name('kys.code.index');
        Route::get('/kys-code/create',[KysKodeController::class,'create'])->name('kys.code.create');
        Route::post('/kys-code/store',[KysKodeController::class,'store'])->name('kys.code.store');
        Route::get('/kys-code/delete/{id}',[KysKodeController::class,'delete'])->name('kys.code.delete');
        Route::get('/kys-code/edit/{id}',[KysKodeController::class,'edit'])->name('kys.code.edit');
        Route::post('/kys-code/update',[KysKodeController::class,'update'])->name('kys.code.update');


        Route::get('/activity/index',[ActivityController::class,'index'])->name('activity.index');
        Route::get('/activity/create',[ActivityController::class,'create'])->name('activity.create');
        Route::post('/activity/store',[ActivityController::class,'store'])->name('activity.store');
        Route::get('/activity/edit/{id}',[ActivityController::class,'edit'])->name('activity.edit');
        Route::get('/activity/delete/{id}',[ActivityController::class,'delete'])->name('activity.delete');
        Route::post('/activity/update',[ActivityController::class,'update'])->name('activity.update');





    });
});
