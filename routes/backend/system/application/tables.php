<?php

// APPLICATIONS - INDEX
Route::get('/dashboard/applications', function () {
  return redirect('/dashboard')->with('error', __('system.notification.error./'));
});

// APPLICATION TABLES - INDEX
Route::get('/dashboard/applications/tables', function () {
  return view('pages.backend.system.application.table.index');
});

// TABLES - GENERALS
Route::group([
  'as' => 'dashboard.system.application.table.generals.',
  'prefix' => 'dashboard/applications/tables/generals',
  'namespace' => 'App\Http\Controllers\Backend\System\Application\Table',
], function () {
  Route::get('activities', 'GeneralController@activity')->name('activity');
  Route::get('active/{id}', 'GeneralController@active')->name('active');
  Route::get('inactive/{id}', 'GeneralController@inactive')->name('inactive');
  Route::get('delete/{id}', 'GeneralController@delete')->name('delete');
  Route::get('deleteall', 'GeneralController@deleteall')->name('delete-all');
  Route::get('delete-permanent/{id}', 'GeneralController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'GeneralController@delete_permanentall')->name('delete-permanentall');
  Route::get('restore/{id}', 'GeneralController@restore')->name('restore');
  Route::get('restoreall', 'GeneralController@restoreall')->name('restore-all');
  Route::get('status-success/{id}', 'GeneralController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'GeneralController@status_pending')->name('status-pending');
  Route::get('trash', 'GeneralController@trash')->name('trash');
  Route::resource('/', 'GeneralController')->parameters(['' => 'id']);
});

// TABLES - RELATIONS
Route::group([
  'as' => 'dashboard.system.application.table.relations.',
  'prefix' => 'dashboard/applications/tables/relations',
  'namespace' => 'App\Http\Controllers\Backend\System\Application\Table',
], function () {
  Route::get('activities', 'RelationController@activity')->name('activity');
  Route::get('active/{id}', 'RelationController@active')->name('active');
  Route::get('inactive/{id}', 'RelationController@inactive')->name('inactive');
  Route::get('delete/{id}', 'RelationController@delete')->name('delete');
  Route::get('deleteall', 'RelationController@deleteall')->name('delete-all');
  Route::get('delete-permanent/{id}', 'RelationController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'RelationController@delete_permanentall')->name('delete-permanentall');
  Route::get('restore/{id}', 'RelationController@restore')->name('restore');
  Route::get('restoreall', 'RelationController@restoreall')->name('restore-all');
  Route::get('status-success/{id}', 'GeneralController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'GeneralController@status_pending')->name('status-pending');
  Route::get('trash', 'RelationController@trash')->name('trash');
  Route::resource('/', 'RelationController')->parameters(['' => 'id']);
});
