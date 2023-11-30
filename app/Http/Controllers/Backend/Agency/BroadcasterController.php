<?php

namespace App\Http\Controllers\Backend\Agency;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;

class BroadcasterController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware(['auth', 'role:master-administrator|administrator-agency']);
    $this->model = 'App\Models\Backend\Agency\Broadcaster';
    $this->path = 'pages.backend.agency.broadcaster.';
    $this->url = '/dashboard/agency/broadcasters';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    require_once app_path() . '/Helpers/__System/Controllers/DefaultSortController.php';
  }

}
