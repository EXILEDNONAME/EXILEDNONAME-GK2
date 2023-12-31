<?php

namespace App\Http\Controllers\Backend\__System\Application\Table;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;

class GeneralController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware(['auth', 'role:master-administrator']);
    $this->model = 'App\Models\Backend\__System\Application\Table\General';
    $this->path = 'pages.backend.__system.application.table.general.';
    $this->url = '/dashboard/applications/tables/generals';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    require_once app_path() . '/Helpers/__System/Controllers/DefaultSortController.php';
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    $sort = $this->sort;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('date', function ($order) { return empty($order->date) ? NULL : \Carbon\Carbon::parse($order->date)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model', 'sort'));
  }

  public function store(Request $request) {
    $validated = $request->validate($this->RequestStore);
    $store = $request->all();
    foreach ($request->date as $data) {
      $store['date'] = \Carbon\Carbon::now()->format('Y') . '-'. $request->month . '-' . $data . ' ' . $request->time;
      $this->model::create($store);
    }

    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }


}
