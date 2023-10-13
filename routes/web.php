<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SearchMemberController;
use App\Http\Controllers\Frontend\DownloadController;
use App\Http\Controllers\ItemController;

Auth::routes();
Route::get('/', function () { return view('pages.frontend.index'); });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

include(base_path(). '/routes/demo/search.php');

include(base_path(). '/routes/backend/main/defaults.php');

include(base_path(). '/routes/backend/system/login.php');
include(base_path(). '/routes/backend/system/defaults.php');
include(base_path(). '/routes/backend/system/managements.php');
include(base_path(). '/routes/backend/system/application/tables.php');

// SEARCH MEMBERS
Route::get('search-members', [SearchMemberController::class, 'index']);
Route::get('search-members/{slug}', [SearchMemberController::class, 'show']);

// DASHBOARD - PK
Route::group([
  'as' => 'dashboard.main.pk.registers.',
  'prefix' => 'dashboard/pk/registers',
  'namespace' => 'App\Http\Controllers\Backend\Main\PK',
], function () {
  Route::get('activities', 'RegisterController@activity')->name('activity');
  Route::get('active/{id}', 'RegisterController@active')->name('active');
  Route::get('inactive/{id}', 'RegisterController@inactive')->name('inactive');
  Route::get('delete/{id}', 'RegisterController@delete')->name('delete');
  Route::get('deleteall', 'RegisterController@deleteall')->name('delete-all');
  Route::get('delete-permanent/{id}', 'RegisterController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'RegisterController@delete_permanentall')->name('delete-permanentall');
  Route::get('restore/{id}', 'RegisterController@restore')->name('restore');
  Route::get('restoreall', 'RegisterController@restoreall')->name('restore-all');
  Route::get('status-success/{id}', 'RegisterController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'RegisterController@status_pending')->name('status-pending');
  Route::get('trash', 'RegisterController@trash')->name('trash');
  Route::resource('/', 'RegisterController')->parameters(['' => 'id']);
});

Route::get('/schedules', [App\Http\Controllers\Frontend\ScheduleController::class,'index']);
Route::get('/schedules/get-event-content-challenges', [App\Http\Controllers\Frontend\ScheduleController::class,'get_event_content_challenges']);
Route::get('/schedules/get-event-content-festivals', [App\Http\Controllers\Frontend\ScheduleController::class,'get_event_content_festivals']);
Route::get('/schedules/get-event-cosplay-characters', [App\Http\Controllers\Frontend\ScheduleController::class,'get_event_cosplay_characters']);
Route::get('/schedules/get-event-special-talent-live-house', [App\Http\Controllers\Frontend\ScheduleController::class,'get_event_special_talent_live_house']);

Route::get('/schedules/events', [App\Http\Controllers\ScheduleController::class,'index']);
Route::get('/schedules/pk', [App\Http\Controllers\ScheduleController::class,'pk']);
Route::get('/schedules/get-pk-party', [App\Http\Controllers\ScheduleController::class,'get_pk_party']);
Route::get('/schedules/get-pk-weekend', [App\Http\Controllers\ScheduleController::class,'get_pk_weekend']);
