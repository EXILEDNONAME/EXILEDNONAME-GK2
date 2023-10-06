<?php

namespace App\Http\Controllers\Backend\Main\Family;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\System\Controller\DefaultController;

class MemberController extends Controller {

  use DefaultController;

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/families/members';
    $this->path = 'pages.backend.main.family.member.';
    $this->model = 'App\Models\Backend\Main\Family\Member';

    require_once app_path() . '/Helpers/System/Controllers/DefaultSortController.php';

    $this->StoreRequest = [
      'name'  => 'required|unique:application_table_generals',
    ];

    $this->UpdateRequest = [
      'name'  => 'required|unique:application_table_generals,name,' . $request->id,
    ];

  }

}
