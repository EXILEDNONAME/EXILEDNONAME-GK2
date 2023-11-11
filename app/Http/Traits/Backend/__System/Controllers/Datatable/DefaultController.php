<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable;

trait DefaultController {

  // CONTROLLER DEFAULTS
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\IndexController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\ShowController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\CreateController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\StoreController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\EditController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\UpdateController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\DestroyController;

  // CONTROLLER EXTENSIONS
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\ActiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\ActivityController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\InactiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\DeleteController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\DeletePermanentController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\RestoreController;

  // CONTROLLER SELECTED
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedActiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedInactiveController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedDeleteController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedDeletePermanentController;
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\SelectedRestoreController;

  // CONTROLLER PAGES
  use \App\Http\Traits\Backend\__System\Controllers\Datatable\Extension\TrashController;
}
