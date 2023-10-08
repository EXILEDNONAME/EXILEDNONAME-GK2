<?php

namespace App\Http\Controllers\Backend\Main\Family;

use Auth;
use DataTables;
use Redirect, Response;
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

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('date_join', function ($order) { return \Carbon\Carbon::parse($order->date_join)->format('d F Y'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'action'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

}
