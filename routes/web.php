<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Select2SearchController;

Route::get('/', function () { return view('pages.frontend.index'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('dashboard', 'App\Http\Controllers\Backend\DashboardController@index')->name('dashboard.index');
Route::get('dashboard/file-manager', 'App\Http\Controllers\Backend\SystemController@file_manager')->name('dashboard.file-manager');
Route::get('dashboard/language/{language}', 'App\Http\Controllers\Backend\SystemController@language')->name('language');
Route::get('dashboard/logout', 'App\Http\Controllers\Backend\SystemController@logout')->name('dashboard.logout');

Route::get('dashboard/settings', function () { return redirect('/dashboard'); });

Route::get('dashboard/settings/profile', 'App\Http\Controllers\Backend\System\Setting\ProfileController@index')->name('index');
Route::get('dashboard/settings/profile/account-informations', 'App\Http\Controllers\Backend\System\Setting\ProfileController@account_information')->name('account-information');
Route::patch('dashboard/settings/profile/account-informations/update/{id}', 'App\Http\Controllers\Backend\System\Setting\ProfileController@account_information_update')->name('account-information-update');
Route::get('dashboard/settings/profile/change-password', 'App\Http\Controllers\Backend\System\Setting\ProfileController@change_password')->name('change-password');
Route::post('dashboard/settings/profile/update-password', 'App\Http\Controllers\Backend\System\Setting\ProfileController@update_password')->name('update-password');

Route::get('dashboard/settings/customizations', 'App\Http\Controllers\Backend\SystemController@customization')->name('dashboard.customization');
Route::patch('dashboard/settings/customizations/update/{id}', 'App\Http\Controllers\Backend\System\SystemController@customization_update')->name('customization-update');

include(base_path(). '/routes/backend/system/managements.php');
include(base_path(). '/routes/backend/system/application/tables.php');

include(base_path(). '/routes/backend/main/managements.php');

// TEST
Route::get('demos/categories','App\Http\Controllers\CategoryController@index');
Route::get('demos/categories/{id}','App\Http\Controllers\CategoryController@getCategory')->name('categories');

Route::get('/search', [Select2SearchController::class, 'index']);
Route::get('/ajax-autocomplete-search', [Select2SearchController::class, 'selectSearch']);
