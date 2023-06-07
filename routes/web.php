<?php

use App\Http\Controllers\backend\auth\AuthController;
use App\Http\Controllers\backend\kys\KyscategoryController;
use App\Http\Controllers\backend\kys\KysKodeController;
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

        Route::get('/users/create',[UserController::class,'create'])->name('users.create');
        Route::post('/users/store',[UserController::class,'store'])->name('users.store');
        Route::get('/users/index',[UserController::class,'index'])->name('users.index');
        Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
        Route::get('/users/edit/{id}',[UserController::class,'edit'])->name('users.edit');
        Route::post('/user/image-update',[UserController::class,'image_update'])->name('users.image.update');
        Route::post('/user/information-update',[UserController::class,'information_update'])->name('users.information.update');
        Route::post('/user/password-update',[UserController::class,'password_update'])->name('users.password.update');

        Route::get('/kys-category/index',[KyscategoryController::class,'index'])->name('kys.category.index');
        Route::post('/kys-category/store',[KyscategoryController::class,'store'])->name('kys.category.store');
        Route::get('/kys-category/delete/{id}',[KyscategoryController::class,'delete'])->name('kys.category.delete');

        Route::get('/kys-code/index',[KysKodeController::class,'index'])->name('kys.code.index');
        Route::post('/kys-code/store',[KysKodeController::class,'store'])->name('kys.code.store');

    });
});
