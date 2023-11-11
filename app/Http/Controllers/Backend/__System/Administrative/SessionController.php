<?php

namespace App\Http\Controllers\Backend\__System\Administrative;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;

class SessionController extends Controller {

  function __construct() {
    $this->middleware(['auth', 'role:master-administrator']);
    $this->model = 'App\Models\Backend\__System\Administrative\Session';
    $this->path = 'pages.backend.__system.administrative.session.';
    $this->url = '/dashboard/administrative/sessions';
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
      ->editColumn('user_id', function ($order) {
        if (!empty($order->user_id)) {
          $data = \App\Models\User::where('id', $order->user_id)->first();
          return $data->name . '<br>' . $data->email . '<br>' . $data->phone;
        }
      })
      ->editColumn('last_activity', function ($order) {
        $data = $order->last_activity;
        $datetime = date("d F Y, H:i:s", $data);
        return $datetime;
      })
      ->rawColumns(['user_id'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model', 'sort'));
  }

  /**
  **************************************************
  * @return RESET
  **************************************************
  **/

  public function reset() {
    $data = $this->model::truncate();
    return Response::json($data);
  }

}
