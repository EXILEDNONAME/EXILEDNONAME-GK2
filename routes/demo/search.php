<?php

use App\Http\Controllers\__demo\SearchController;

Route::get('users', [SearchController::class, 'index']);
Route::get('users/{slug}', [SearchController::class, 'show'])->name('users.show');
