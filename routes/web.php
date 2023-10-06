<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SearchMemberController;
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

//

Route::get('search-members', [SearchMemberController::class, 'index']);
Route::get('search-members/{slug}', [SearchMemberController::class, 'show']);

//
Route::get('/demo/csv', [ItemController::class,'index']);
Route::post('/demo/csv', [ItemController::class,'upload_csv_file'])->name('upload');
