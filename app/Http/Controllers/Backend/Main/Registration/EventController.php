<?php

namespace App\Http\Controllers\Backend\Main\Registration;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\System\Controller\DefaultController;

class EventController extends Controller {

  use DefaultController;

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/registrations/events';
    $this->path = 'pages.backend.main.registration.event.';
    $this->model = 'App\Models\Backend\Main\Registration\Event';
    $this->StoreRequest = [
      // 'name'  => 'required|unique:application_table_generals',
    ];

    $this->UpdateRequest = [
      // 'name'  => 'required|unique:application_table_generals,name,' . $request->id,
    ];

  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {

    if(Auth::User()->accesses->name == "User") { $this->data = $this->model::where('id_bigo', Auth::User()->username)->get(); }
    else if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else if (request('date_start_1') && request('date_end_1')) { $this->data = $this->model::orderby('date', 'desc')->whereBetween('date', [request('date_start_1'), request('date_end_1')])->get(); }
    else if (request('date_start') == null ) { $this->data = $this->model::orderBy('date_start', 'desc')->get(); }
    else { $this->data = $this->model::get(); }

    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date', function ($order) { return \Carbon\Carbon::parse($order->date)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'action'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'index');
  }

  /**
  **************************************************
  * @return STATUS-SUCCESS
  * @return STATUS-PENDING
  **************************************************
  **/

  public function status_success($id) {
    if(Auth::User()->accesses->name == "Administrator") { $data = $this->model::where('id', $id)->update([ 'status' => 1 ]); }
    else { $data = $this->model::where('id', $id)->update([ 'status_error' => 1 ]); }
    return Response::json($data);
  }

  public function status_pending($id) {
    if(Auth::User()->accesses->name == "Administrator") { $data = $this->model::where('id', $id)->update([ 'status' => 2 ]); }
    else { $data = $this->model::where('id', $id)->update([ 'status_error' => 1 ]); }
    return Response::json($data);
  }

}
