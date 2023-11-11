<?php

namespace App\Http\Controllers\Backend\__System\Application\Table;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;

class PermissionController extends Controller {

  use DefaultController;

  function __construct() {
    $this->model = 'App\Models\Backend\__System\Application\Table\Permission';
    $this->path = 'pages.backend.__system.application.table.permission.';
    $this->url = '/dashboard/applications/tables/permissions';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    require_once app_path() . '/Helpers/__System/Controllers/DefaultSortController.php';
  }

}
