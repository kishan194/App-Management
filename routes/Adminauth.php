<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\RegisteredUserController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use App\Http\Controllers\ApkUploadController;
use App\Http\Controllers\AppManageController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest:admin'],'prefix'=>'admin' , 'as' =>'admin.'],function(){


          Route::get('register', [RegisteredUserController::class, 'create'])
                      ->name('register');
      
          Route::post('register', [RegisteredUserController::class, 'store']);
      
          Route::get('login', [AuthenticatedSessionController::class, 'create'])
                      ->name('login');
      
          Route::post('login', [AuthenticatedSessionController::class, 'store']);
      
          Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                      ->name('password.request');
      
          Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                      ->name('password.email');
      
          Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                      ->name('password.reset');
          
          Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
        });

     Route::group(['middleware' => ['auth:admin'],'prefix'=>'admin' , 'as' =>'admin.'],function()
     {
          Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
      
          Route::get('verify-email/{id}/{hash}', VerifyEmailController::class) ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
       
          Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
      
          Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
      
          Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
      
          Route::put('password', [PasswordController::class, 'update'])->name('password.update');
      
          Route::post('logout',[AuthenticatedSessionController::class, 'destroy'])->name('logout');

          Route::get('create',[AppManageController::class,'create'])->name('App.create');
          Route::post('upload',[AppManageController::class,'upload'])->name('upload.image');
          Route::post('store',[AppManageController::class,'AppStore'])->name('App.Store');

          Route::get('index',[AppManageController::class,'index'])->name('App.index');

          //update app route
          Route::get('/updateApp/{id}',[AppManageController::class,'updateapp'])->name('update.app');
          Route::put('edit/{id}',[AppManageController::class,'editApp'])->name('edit.app');

          //delete app route
          Route::get('deleteApp/{id}',[AppManageController::class,'DeleteApp'])->name('Delete.app');

          Route::get('app/search',[AppManageController::class,'index'])->name('search.app');


          //Apk Upload
          Route::get('apkCreate',[ApkUploadController::class,'create'])->name('apk.create');
          Route::post('apkStore',[ApkUploadController::class,'ApkStore'])->name('apk.Store');

          Route::get('apkindex',[ApkUploadController::class,'ApkIndex'])->name('apk.Index');
          

          Route::get('apk/{filename}',[ApkUploadController::class,'download'])->name('apk.download');

          Route::get('/updateApk/{id}',[ApkUploadController::class,'updateapk'])->name('update.apk');
          Route::put('editApk/{id}',[ApkUploadController::class,'editApk'])->name('apk.edit');

          Route::get('DeleteApk/{id}',[ApkUploadController::class,'DeleteApk'])->name('Delete.apk');

          Route::get('/admin/apk/search',[ApkUploadController::class,'ApkIndex'])->name('search.apk');

          Route::get('/singleApk/{id}', [ApkUploadController::class, 'singleApk'])->name('single.apk');

          Route::get('filter', [ApkUploadController::class,'ApkIndex'])->name('filter.apk');


          

      });