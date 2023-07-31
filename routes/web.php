<?php

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


        Route::get('/project/index',[ProjectController::class,'index'])->name('project.index');
        Route::get('/project/create',[ProjectController::class,'create'])->name('project.create');
        Route::post('/project/store',[ProjectController::class,'store'])->name('project.store');
        Route::get('/project/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');
        Route::get('/project/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
        Route::post('/project/update',[ProjectController::class,'update'])->name('project.update');


        Route::get('/education/index',[EducationController::class,'index'])->name('education.index');
        Route::get('/education/create',[EducationController::class,'create'])->name('education.create');
        Route::post('/education/store',[EducationController::class,'store'])->name('education.store');
        Route::get('/education/delete/{id}',[EducationController::class,'delete'])->name('education.delete');
        Route::get('/education/edit/{id}',[EducationController::class,'edit'])->name('education.edit');
        Route::post('/education/update',[EducationController::class,'update'])->name('education.update');

        Route::get('/sks/index',[SksController::class,'index'])->name('sks.index');
        Route::get('/sks/create',[SksController::class,'create'])->name('sks.create');
        Route::post('/sks/store',[SksController::class,'store'])->name('sks.store');
        Route::get('/sks/delete/{id}',[SksController::class,'delete'])->name('sks.delete');
        Route::get('/sks/edit/{id}',[SksController::class,'edit'])->name('sks.edit');
        Route::post('/sks/update',[SksController::class,'update'])->name('sks.update');

        Route::get('/cultural/index',[CulturalController::class,'index'])->name('cultural.index');
        Route::get('/cultural/create',[CulturalController::class,'create'])->name('cultural.create');
        Route::post('/cultural/store',[CulturalController::class,'store'])->name('cultural.store');
        Route::get('/cultural/delete/{id}',[CulturalController::class,'delete'])->name('cultural.delete');
        Route::get('/cultural/edit/{id}',[CulturalController::class,'edit'])->name('cultural.edit');
        Route::post('/cultural/update',[CulturalController::class,'update'])->name('cultural.update');


    });
});
