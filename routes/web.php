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

Route::get('/dashboard/events/content-challenges', [App\Http\Controllers\Backend\Main\Event\ContentChallengeController::class,'index']);
Route::get('/dashboard/events/content-festivals', [App\Http\Controllers\Backend\Main\Event\ContentFestivalController::class,'index']);
Route::get('/dashboard/events/e-commerce', [App\Http\Controllers\Backend\Main\Event\CommerceController::class,'index']);
Route::get('/dashboard/events/special-talent-live-house', [App\Http\Controllers\Backend\Main\Event\SpecialTalentLiveHouseController::class,'index']);
