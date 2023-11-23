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

// EVENTS
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

// SCHEDULES - EVENTS
Route::get('dashboard/schedules/events', [App\Http\Controllers\Backend\Schedule\EventController::class, 'index']);

Route::get('dashboard/schedules/events/content-challenges', [App\Http\Controllers\Backend\Schedule\EventController::class, 'content_challenges']);
Route::get('dashboard/schedules/events/indonesia-content-festivals', [App\Http\Controllers\Backend\Schedule\EventController::class, 'indonesia_content_festivals']);
Route::get('dashboard/schedules/events/e-commerce', [App\Http\Controllers\Backend\Schedule\EventController::class, 'e_commerce']);

Route::get('dashboard/schedules/events/special-talent-live-house', [App\Http\Controllers\Backend\Schedule\EventController::class, 'special_talent_live_house']);
Route::get('dashboard/schedules/events/get-event-e-commerce', [App\Http\Controllers\Backend\Schedule\EventController::class,'get_event_e_commerce']);
Route::get('dashboard/schedules/events/get-event-indonesia-content-festival', [App\Http\Controllers\Backend\Schedule\EventController::class,'get_event_indonesia_content_festival']);
Route::get('dashboard/schedules/events/get-event-content-challenge', [App\Http\Controllers\Backend\Schedule\EventController::class,'get_event_content_challenge']);
Route::get('dashboard/schedules/events/get-event-special-talent-livehouse', [App\Http\Controllers\Backend\Schedule\EventController::class,'get_event_special_talent_live_house']);

// SCHEDULES - PK
Route::get('dashboard/schedules/pk', [App\Http\Controllers\Backend\Schedule\PKController::class, 'index']);
Route::get('dashboard/schedules/pk/party', [App\Http\Controllers\Backend\Schedule\PKController::class, 'party']);
Route::get('dashboard/schedules/pk/weekend', [App\Http\Controllers\Backend\Schedule\PKController::class, 'weekend']);
Route::get('dashboard/schedules/pk/epical-glory', [App\Http\Controllers\Backend\Schedule\PKController::class, 'epical_glory']);

Route::get('dashboard/schedules/pk/get-pk-epical-glory', [App\Http\Controllers\Backend\Schedule\PKController::class,'get_pk_epical_glory']);
Route::get('dashboard/schedules/pk/get-pk-party', [App\Http\Controllers\Backend\Schedule\PKController::class,'get_pk_party']);
Route::get('dashboard/schedules/pk/get-pk-weekend', [App\Http\Controllers\Backend\Schedule\PKController::class,'get_pk_weekend']);

Route::get('/clear-cache', function() {
  $exitCode = \Artisan::call('cache:clear');
  return '<h1>Cache facade value cleared</h1>';
});

Route::get('/dashboard/invoices', function () { return view('pages.backend.invoice.index'); });
