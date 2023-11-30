<?php

namespace App\Http\Controllers\Backend\Controller;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware(['auth', 'role:master-administrator']);
    $this->model = 'App\Models\Backend\Controller\Dashboard';
    $this->path = 'pages.backend.controller.dashboard.';
    $this->url = '/dashboard/controllers/dashboard';
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
      ->editColumn('file_modified', function ($order) {
        if ($order->file != null) { return date("d F Y", filemtime(Storage::path($order->file . ".xlsx"))) . "<br>" . date("H:i:s", filemtime(Storage::path($order->file . ".xlsx"))); }
        else { return '-'; }
      })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'file_modified'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model', 'sort'));
  }

  /**
  **************************************************
  * @return SYNCHRONIZATION
  **************************************************
  **/

  public function synchronization($id) {
    $data = $this->model::where('id', $id)->first();

    if($data->name == 'EVENT INDONESIA CONTENT FESTIVALS') {
      $download_event_indonesia_content_festival = $data->url_synchronization . "/export?format=xlsx";
      $file_event_indonesia_content_festival = Storage::disk('local')->put('bigo-indonesia-content-festival.xlsx', file_get_contents($download_event_indonesia_content_festival));
    }
    if($data->name == 'PK PARTY') {
      $download_pk_party = $data->url_synchronization . "/export?format=xlsx";
      $file_pk_party = Storage::disk('local')->put('bigo-pk-party-test.xlsx', file_get_contents($download_pk_party));
    }
    return Response::json($data);
  }

}
