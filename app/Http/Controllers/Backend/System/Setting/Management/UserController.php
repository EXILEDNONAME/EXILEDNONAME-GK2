<?php

namespace App\Http\Controllers\Backend\System\Setting\Management;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\System\DefaultRestrictController;

class UserController extends Controller {

  use DefaultRestrictController;

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/settings/managements/users';
    $this->path = 'pages.backend.system.setting.management.user.';
    $this->model = 'App\Models\User';

    require_once app_path() . '/Helpers/System/Controllers/DefaultSortController.php';

    $this->StoreRequest = [
      'username'  => 'required|unique:users',
      'email'     => 'required|unique:users',
      'phone'     => 'required|unique:users',
    ];

    $this->UpdateRequest = [
      'name'  => 'required|unique:users,name,' . $request->id,
    ];

  }

}
