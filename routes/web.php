<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () { return view('pages.frontend.index'); });

include(base_path(). '/routes/backend/__system/application.php');
include(base_path(). '/routes/backend/__system/profile.php');
include(base_path(). '/routes/backend/__system/default.php');
include(base_path(). '/routes/backend/__system/administrative.php');

// EVENTS
Route::group([
  'as' => 'dashboard.events.',
  'prefix' => 'dashboard/events',
  'namespace' => 'App\Http\Controllers\Backend',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'EventController@active')->name('active');
  Route::get('activities', 'EventController@activity')->name('activity');
  Route::get('inactive/{id}', 'EventController@inactive')->name('inactive');
  Route::get('status-success/{id}', 'EventController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'EventController@status_pending')->name('status-pending');
  Route::get('delete/{id}', 'EventController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'EventController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'EventController@restore')->name('restore');
  Route::get('trash', 'EventController@trash')->name('trash');
  Route::get('selected-active', 'EventController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'EventController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'EventController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'EventController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'EventController@selected_restore')->name('selected-restore');
  Route::resource('/', 'EventController')->parameters(['' => 'id']);
});
