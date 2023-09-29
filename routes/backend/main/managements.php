<?php


// MANAGEMENTS - Broadcasters
Route::group([
  'as' => 'dashboard.main.management.broadcasters.',
  'prefix' => 'dashboard/managements/broadcasters',
  'namespace' => 'App\Http\Controllers\Backend\Main\Management',
], function () {
  Route::get('activities', 'BroadcasterController@activity')->name('activity');
  Route::get('active/{id}', 'BroadcasterController@active')->name('active');
  Route::get('inactive/{id}', 'BroadcasterController@inactive')->name('inactive');
  Route::get('delete/{id}', 'BroadcasterController@delete')->name('delete');
  Route::get('deleteall', 'BroadcasterController@deleteall')->name('delete-all');
  Route::get('delete-permanent/{id}', 'BroadcasterController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'BroadcasterController@delete_permanentall')->name('delete-permanentall');
  Route::get('restore/{id}', 'BroadcasterController@restore')->name('restore');
  Route::get('restoreall', 'BroadcasterController@restoreall')->name('restore-all');
  Route::get('status-success/{id}', 'BroadcasterController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'BroadcasterController@status_pending')->name('status-pending');
  Route::get('trash', 'BroadcasterController@trash')->name('trash');
  Route::resource('/', 'BroadcasterController')->parameters(['' => 'id']);
});
