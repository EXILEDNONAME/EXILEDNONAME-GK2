<?php

namespace App\Http\Controllers\Backend\Main\PK;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\System\Controller\DefaultController;

class RegisterController extends Controller {

  use DefaultController;

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/pk/registers';
    $this->path = 'pages.backend.main.pk.register.';
    $this->model = 'App\Models\Backend\Main\PK\Register';

    require_once app_path() . '/Helpers/System/Controllers/DefaultSortController.php';

    $this->StoreRequest = [
      // 'name'  => 'required|unique:application_table_generals',
    ];

    $this->UpdateRequest = [
      // 'name'  => 'required|unique:application_table_generals,name,' . $request->id,
    ];

  }

}
