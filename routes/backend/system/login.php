<?php

Route::get('login/google/redirect', [App\Http\Controllers\SocialiteController::class, 'redirect'])->middleware(['guest'])->name('redirect');
Route::get('login/google/callback', [App\Http\Controllers\SocialiteController::class, 'callback'])->middleware(['guest'])->name('callback');
Route::post('logout', [App\Http\Controllers\SocialiteController::class, 'logout'])->middleware(['auth'])->name('logout');
