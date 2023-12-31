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
  Route::get('downloadfile/{id}', 'EventController@downloadfile')->name('downloadfile');
  Route::get('active/{id}', 'EventController@active')->name('active');
  Route::get('activities', 'EventController@activity')->name('activity');
  Route::get('inactive/{id}', 'EventController@inactive')->name('inactive');
  Route::get('status-success/{id}', 'EventController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'EventController@status_pending')->name('status-pending');
  Route::get('status-progress/{id}', 'EventController@status_progress')->name('status-progress');

  Route::get('wa-status-progress/{id}', 'EventController@wa_status_progress')->name('wa-status-progress');
  Route::get('wa-status-success/{id}', 'EventController@wa_status_success')->name('wa-status-success');

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

// FAMILY - MEMBERS
Route::group([
  'as' => 'dashboard.family.members.',
  'prefix' => 'dashboard/family/members',
  'namespace' => 'App\Http\Controllers\Backend\Family',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'MemberController@active')->name('active');
  Route::get('activities', 'MemberController@activity')->name('activity');
  Route::get('inactive/{id}', 'MemberController@inactive')->name('inactive');
  Route::get('status-success/{id}', 'MemberController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'MemberController@status_pending')->name('status-pending');
  Route::get('delete/{id}', 'MemberController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'MemberController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'MemberController@restore')->name('restore');
  Route::get('trash', 'MemberController@trash')->name('trash');
  Route::get('selected-active', 'MemberController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'MemberController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'MemberController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'MemberController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'MemberController@selected_restore')->name('selected-restore');
  Route::resource('/', 'MemberController')->parameters(['' => 'id']);
});

// SEARCH MEMBERS
Route::get('dashboard/search-members', [App\Http\Controllers\Backend\SearchMemberController::class, 'index']);
Route::get('dashboard/search-members/{slug}', [App\Http\Controllers\Backend\SearchMemberController::class, 'show']);

Route::get('/clear-cache', function() {
  $exitCode = \Artisan::call('cache:clear');
  return '<h1>Cache facade value cleared</h1>';
});

Route::get('/dashboard/invoices', function () { return view('pages.backend.invoice.index'); });

// AGENCY - BROADCASTERS
Route::group([
  'as' => 'dashboard.agency.broadcasters.',
  'prefix' => 'dashboard/agency/broadcasters',
  'namespace' => 'App\Http\Controllers\Backend\Agency',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'BroadcasterController@active')->name('active');
  Route::get('activities', 'BroadcasterController@activity')->name('activity');
  Route::get('inactive/{id}', 'BroadcasterController@inactive')->name('inactive');
  Route::get('status-success/{id}', 'BroadcasterController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'BroadcasterController@status_pending')->name('status-pending');
  Route::get('delete/{id}', 'BroadcasterController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'BroadcasterController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'BroadcasterController@restore')->name('restore');
  Route::get('trash', 'BroadcasterController@trash')->name('trash');
  Route::get('selected-active', 'BroadcasterController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'BroadcasterController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'BroadcasterController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'BroadcasterController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'BroadcasterController@selected_restore')->name('selected-restore');
  Route::resource('/', 'BroadcasterController')->parameters(['' => 'id']);
});

// CONTROLLERS - DASHBOARD
Route::group([
  'as' => 'dashboard.controller.dashboards.',
  'prefix' => 'dashboard/controllers/dashboard',
  'namespace' => 'App\Http\Controllers\Backend\Controller',
  'middleware' => 'auth',
], function () {
  Route::get('synchronization/{id}', 'DashboardController@synchronization')->name('synchronization');
  Route::get('active/{id}', 'DashboardController@active')->name('active');
  Route::get('activities', 'DashboardController@activity')->name('activity');
  Route::get('inactive/{id}', 'DashboardController@inactive')->name('inactive');
  Route::get('status-success/{id}', 'DashboardController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'DashboardController@status_pending')->name('status-pending');
  Route::get('delete/{id}', 'DashboardController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'DashboardController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'DashboardController@restore')->name('restore');
  Route::get('trash', 'DashboardController@trash')->name('trash');
  Route::get('selected-active', 'DashboardController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'DashboardController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'DashboardController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'DashboardController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'DashboardController@selected_restore')->name('selected-restore');
  Route::resource('/', 'DashboardController')->parameters(['' => 'id']);
});

// SCHEDULES - REPORTS
Route::get('dashboard/agency/reports', [App\Http\Controllers\Backend\Agency\ReportController::class, 'index']);
Route::get('dashboard/agency/reports/{slug}', [App\Http\Controllers\Backend\Agency\ReportController::class, 'index_YM']);
