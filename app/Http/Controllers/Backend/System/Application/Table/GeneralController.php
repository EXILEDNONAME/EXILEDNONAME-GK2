<?php

namespace App\Http\Controllers\Backend\System\Application\Table;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\System\Controller\DefaultController;

class GeneralController extends Controller {

  use DefaultController;

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/applications/tables/generals';
    $this->path = 'pages.backend.system.application.table.general.';
    $this->model = 'App\Models\Backend\System\Application\Table\General';

    require_once app_path() . '/Helpers/System/Controllers/DefaultSortController.php';

    $this->StoreRequest = [
      'name'  => 'required|unique:application_table_generals',
    ];

    $this->UpdateRequest = [
      'name'  => 'required|unique:application_table_generals,name,' . $request->id,
    ];

  }

}
