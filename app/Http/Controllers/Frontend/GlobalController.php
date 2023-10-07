<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GlobalController extends Controller {

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/schedules';
    $this->path = 'pages.frontend.schedule.';

    $this->db = env('DBTABLE_CONTENT_FESTIVAL');

    $this->date = \Carbon\Carbon::now()->format('d/m/Y');
    $this->data = \DB::table($this->db)->where('COL 3', $this->date)->where('COL 4', 'like', '%2741%')->get();
  }

  public function index() {
    if (request()->ajax()) { return DataTables::of($this->data)
      ->editColumn('COL 3', function ($order) { return \Carbon\Carbon::parse($order->{'COL 3'})->format('m-d-Y'); })
      ->addIndexColumn()->make(true); }
    return view($this->path . 'index');
  }

}
