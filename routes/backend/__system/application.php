<?php

// TABLES - GENERALS
Route::group([
  'as' => 'dashboard.system.application.table.generals.',
  'prefix' => 'dashboard/applications/tables/generals',
  'namespace' => 'App\Http\Controllers\Backend\__System\Application\Table',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'GeneralController@active')->name('active');
  Route::get('activities', 'GeneralController@activity')->name('activity');
  Route::get('inactive/{id}', 'GeneralController@inactive')->name('inactive');
  Route::get('delete/{id}', 'GeneralController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'GeneralController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'GeneralController@restore')->name('restore');
  Route::get('trash', 'GeneralController@trash')->name('trash');
  Route::get('selected-active', 'GeneralController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'GeneralController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'GeneralController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'GeneralController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'GeneralController@selected_restore')->name('selected-restore');
  Route::resource('/', 'GeneralController')->parameters(['' => 'id']);
});

// TABLES - RELATIONS
Route::group([
  'as' => 'dashboard.system.application.table.relations.',
  'prefix' => 'dashboard/applications/tables/relations',
  'namespace' => 'App\Http\Controllers\Backend\__System\Application\Table',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'RelationController@active')->name('active');
  Route::get('activities', 'RelationController@activity')->name('activity');
  Route::get('inactive/{id}', 'RelationController@inactive')->name('inactive');
  Route::get('delete/{id}', 'RelationController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'RelationController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'RelationController@restore')->name('restore');
  Route::get('trash', 'RelationController@trash')->name('trash');
  Route::get('selected-active', 'RelationController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'RelationController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'RelationController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'RelationController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'RelationController@selected_restore')->name('selected-restore');
  Route::resource('/', 'RelationController')->parameters(['' => 'id']);
});

// TABLES - PERMISSIONS
Route::group([
  'as' => 'dashboard.system.application.table.permissions.',
  'prefix' => 'dashboard/applications/tables/permissions',
  'namespace' => 'App\Http\Controllers\Backend\__System\Application\Table',
  'middleware' => 'auth',
], function () {
  Route::get('active/{id}', 'PermissionController@active')->name('active');
  Route::get('activities', 'PermissionController@activity')->name('activity');
  Route::get('inactive/{id}', 'PermissionController@inactive')->name('inactive');
  Route::get('delete/{id}', 'PermissionController@delete')->name('delete');
  Route::get('delete-permanent/{id}', 'PermissionController@delete_permanent')->name('delete-permanent');
  Route::get('restore/{id}', 'PermissionController@restore')->name('restore');
  Route::get('trash', 'PermissionController@trash')->name('trash');
  Route::get('selected-active', 'PermissionController@selected_active')->name('selected-active');
  Route::get('selected-inactive', 'PermissionController@selected_inactive')->name('selected-inactive');
  Route::get('selected-delete', 'PermissionController@selected_delete')->name('selected-delete');
  Route::get('selected-delete-permanent', 'PermissionController@selected_delete_permanent')->name('selected-delete-permanent');
  Route::get('selected-restore', 'PermissionController@selected_restore')->name('selected-restore');
  Route::resource('/', 'PermissionController')->parameters(['' => 'id']);
});
