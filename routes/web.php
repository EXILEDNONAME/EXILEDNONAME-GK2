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

// SCHEDULES
Route::get('/schedules', [App\Http\Controllers\Frontend\GlobalController::class,'index']);
Route::get('/schedules/events/content-festivals', [App\Http\Controllers\Frontend\GlobalController::class,'content_festival']);
Route::get('/schedules/events/content-challenges', [App\Http\Controllers\Frontend\GlobalController::class,'content_challenge']);

// DASHBOARD - EVENTS
Route::get('/dashboard/events/content-challenges', [App\Http\Controllers\Backend\Main\Event\ContentChallengeController::class,'index']);
Route::get('/dashboard/events/content-festivals', [App\Http\Controllers\Backend\Main\Event\ContentFestivalController::class,'index']);
Route::get('/dashboard/events/e-commerce', [App\Http\Controllers\Backend\Main\Event\CommerceController::class,'index']);
Route::get('/dashboard/events/special-talent-live-house', [App\Http\Controllers\Backend\Main\Event\SpecialTalentLiveHouseController::class,'index']);

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
Route::get('/dashboard/pk/epical-glory', [App\Http\Controllers\Backend\Main\PK\EpicalGloryController::class,'index']);
Route::get('/dashboard/pk/party', [App\Http\Controllers\Backend\Main\PK\PartyController::class,'index']);
Route::get('/dashboard/pk/weekend', [App\Http\Controllers\Backend\Main\PK\WeekendController::class,'index']);
