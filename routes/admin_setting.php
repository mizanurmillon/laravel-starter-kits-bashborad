<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\Setting\ProfileSettingController;
use App\Http\Controllers\Web\Backend\Setting\SystemSettingsController;

Route::controller(ProfileSettingController::class)->group(function () {
    Route::get('/profile', 'index')->name('admin.profile.index');
    Route::post('/profile/picture', 'pictureUpload')->name('update.profile.picture');
    Route::post('/profile/update', 'update')->name('admin.profile.update');
    Route::post('/password/update', 'passwordUpdate')->name('admin.password.update');
});

Route::controller(SystemSettingsController::class)->group(function () {
    Route::get('/system', 'index')->name('admin.system.index');
    Route::post('/system/update', 'update')->name('admin.system.update');
});