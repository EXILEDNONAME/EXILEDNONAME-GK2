<?php

namespace App\Http\Controllers\Backend\__System\Application\Table;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;

class RelationController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware(['auth', 'role:master-administrator']);
    $this->model = 'App\Models\Backend\__System\Application\Table\Relation';
    $this->path = 'pages.backend.__system.application.table.relation.';
    $this->url = '/dashboard/applications/tables/relations';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    require_once app_path() . '/Helpers/__System/Controllers/DefaultSortController.php';
  }

  public function index() {
    $model = $this->model;
    $sort = $this->sort;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('id_table_generals', function ($order) { return $order->application_table_generals->name; })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'action'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'index', compact('model', 'sort'));
  }

  /**
  **************************************************
  * @return TRASH
  **************************************************
  **/

  public function trash() {
    $data = $this->model::onlyTrashed()->get();
    if(request()->ajax()) {
      return DataTables::of($data)
      ->editColumn('deleted_at', function($order) { return \Carbon\Carbon::parse($order->deleted_at)->format('d F Y, H:i'); })
      ->editColumn('id_table_generals', function ($order) { return $order->application_table_generals->name; })
      ->rawColumns(['description'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'trash', compact('data'));
  }

}
