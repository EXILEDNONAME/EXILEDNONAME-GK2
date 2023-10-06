<?php

// FAMILY - MEMBERS
Route::group([
  'as' => 'dashboard.main.family.members.',
  'prefix' => 'dashboard/families/members',
  'namespace' => 'App\Http\Controllers\Backend\Main\Family',
], function () {
  Route::get('activities', 'MemberController@activity')->name('activity');
  Route::get('active/{id}', 'MemberController@active')->name('active');
  Route::get('inactive/{id}', 'MemberController@inactive')->name('inactive');
  Route::get('delete/{id}', 'MemberController@delete')->name('delete');
  Route::get('deleteall', 'MemberController@deleteall')->name('delete-all');
  Route::get('delete-permanent/{id}', 'MemberController@delete_permanent')->name('delete-permanent');
  Route::get('delete-permanentall', 'MemberController@delete_permanentall')->name('delete-permanentall');
  Route::get('restore/{id}', 'MemberController@restore')->name('restore');
  Route::get('restoreall', 'MemberController@restoreall')->name('restore-all');
  Route::get('status-success/{id}', 'MemberController@status_success')->name('status-success');
  Route::get('status-pending/{id}', 'MemberController@status_pending')->name('status-pending');
  Route::get('trash', 'MemberController@trash')->name('trash');
  Route::resource('/', 'MemberController')->parameters(['' => 'id']);
});
