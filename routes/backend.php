<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\DashboardController;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard');
});