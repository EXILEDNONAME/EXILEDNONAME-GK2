<?php

namespace App\Http\Controllers\Backend\System\Setting\Management;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\System\DefaultRestrictController;

class AccessController extends Controller {

  use DefaultRestrictController;

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/settings/managements/accesses';
    $this->path = 'pages.backend.system.setting.management.access.';
    $this->model = 'App\Models\Access';

    require_once app_path() . '/Helpers/System/Controllers/DefaultSortController.php';

    $this->StoreRequest = [
      'name'  => 'required|unique:accesses',
    ];

    $this->UpdateRequest = [
      'name'  => 'required|unique:accesses,name,' . $request->id,
    ];

  }

}
