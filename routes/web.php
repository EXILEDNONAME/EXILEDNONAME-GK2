<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () { return view('pages.frontend.index'); });

include(base_path(). '/routes/backend/__system/application.php');
include(base_path(). '/routes/backend/__system/profile.php');
include(base_path(). '/routes/backend/__system/default.php');
include(base_path(). '/routes/backend/__system/administrative.php');
