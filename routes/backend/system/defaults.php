<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\System\Setting\ProfileController;
use App\Http\Controllers\Backend\SystemController;

// DASHBOARD
Route::group([
  'prefix' => 'dashboard',
], function () {
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('file-manager', [SystemController::class, 'file_manager']);
Route::get('language/{language}', [SystemController::class, 'language'])->name('language');
Route::get('logout', [SystemController::class, 'logout']);
});

// SETTINGS
Route::group([
  'prefix' => 'dashboard/settings',
], function () {
  Route::get('/', function () { return redirect('/dashboard')->with('error', __('system.notification.error./')); });
  Route::get('customizations', [SystemController::class, 'customization']);
  Route::patch('customizations/update/{id}', [SystemController::class, 'customization_update']);
});

// SETTINGS - PROFILES
Route::group([
  'prefix' => 'dashboard/settings/profile',
], function () {
  Route::get('/', function () { return redirect('dashboard/settings/profile/account-informations'); });
  Route::get('account-informations', [ProfileController::class, 'account_information']);
  Route::patch('account-informations/update/{id}', [ProfileController::class, 'account_information_update']);
  Route::get('change-password', [ProfileController::class, 'change_password']);
  Route::post('update-password', [ProfileController::class, 'update']);
});
