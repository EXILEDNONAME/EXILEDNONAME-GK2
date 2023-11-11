<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;

class OptimizationController extends Controller {


  function __construct() {
    $this->model = 'App\Models\Backend\__System\Administrative\Application\Optimization';
    $this->path = 'pages.backend.__system.administrative.application.optimization.';
    $this->url = '/dashboard/administrative/applications/optimizations';
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
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model', 'sort'));
  }

  /**
  **************************************************
  * @return OPTIMIZE
  **************************************************
  **/

  public function start_optimizing($id) {
    if ($id == 1) {
      $data = \Artisan::call('optimize:clear');
      return Response::json($data);
    }
    if ($id == 2) {
      $data = system('composer dump-autoload');
      return Response::json($data);
    }
  }

}
