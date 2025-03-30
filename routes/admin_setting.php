<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\Setting\ProfileSettingController;

Route::controller(ProfileSettingController::class)->group(function () {
    Route::get('/profile', 'index')->name('admin.profile.index');
    Route::post('/profile/picture', 'pictureUpload')->name('update.profile.picture');
    Route::post('/profile/update', 'update')->name('admin.profile.update');
    Route::post('/password/update', 'passwordUpdate')->name('admin.password.update');
});
