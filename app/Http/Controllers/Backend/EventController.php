<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;

class EventController extends Controller {

  use DefaultController;

  function __construct() {
    $this->model = 'App\Models\Backend\Event';
    $this->path = 'pages.backend.event.';
    $this->url = '/dashboard/events';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    $sort = $this->sort;

    if(Auth::user()->hasRole('master-administrator|administrator')) {
      if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
      else { $this->data = $this->model::get(); }
    }
    else {
      if (request('date_start') && request('date_end')) { $this->data = $this->model::where('id_bigo', Auth::User()->username)->orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
      else { $this->data = $this->model::where('id_bigo', Auth::User()->username)->get(); }
    }

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

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    $validated = $request->validate($this->RequestStore);
    $store = $request->all();
    foreach ($request->date as $data) {
      $store['date'] = \Carbon\Carbon::now()->format('Y') . '-'. $request->month . '-' . $data . ' ' . $request->time;
      $this->model::create($store);
    }

    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return EDIT
  **************************************************
  **/

  public function edit($id) {
    $path = $this->path;
    $model = $this->model;

    if ($this->model::where('id_bigo', Auth::user()->username)->first()) {
      $data = $this->model::findOrFail($id);
    }
    else {
      return redirect($this->url)->with('error', __('default.notification.error./'));
    }

    return view($this->path . 'edit', compact('path', 'data', 'model'));
  }

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    if($this->model::where('id', $id)->where('id_bigo', Auth::user()->username)->first()){
      try {
        $this->model::destroy($id);
        return redirect($this->url)->with('success', __('default.notification.success.item-deleted'));
      } catch (\Exception $e) {
        return redirect($this->url)->with('error', __('default.notification.error'));
      }
    }
    else {
      return redirect($this->url)->with('error', __('default.notification.error./'));
    }
  }

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function delete($id) {
    if($this->model::where('id', $id)->where('id_bigo', Auth::user()->username)->first()){
      $this->model::destroy($id);
      $data = $this->model::where('id', $id)->delete();
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return DELETE-PERMANENT
  **************************************************
  **/

  public function delete_permanent($id) {
    if($this->model::where('id', $id)->where('id_bigo', Auth::user()->username)->first()){
      $data = $this->model::withTrashed()->findOrFail($id);
      if(!$data->trashed()) { return Response::json($data); }
      else {
        $data->forceDelete();
        return Response::json($data);
      }
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return SELECTED-DELETE
  **************************************************
  **/

  public function selected_delete(Request $request) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$data))->delete();
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return SELECTED-DELETE-PERMANENT
  **************************************************
  **/

  public function selected_delete_permanent(Request $request) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$data))->forceDelete();
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return TRASH
  **************************************************
  **/

  public function trash() {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $this->model::onlyTrashed()->get();
      if(request()->ajax()) {
        return DataTables::of($data)
        ->editColumn('deleted_at', function($order) { return \Carbon\Carbon::parse($order->deleted_at)->format('d F Y, H:i'); })
        ->rawColumns(['description'])
        ->addIndexColumn()
        ->make(true);
      }
      return view($this->path . 'trash', compact('data'));
    }
    else {
      return redirect($this->url)->with('error', __('default.notification.error./'));
    }
  }

  /**
  **************************************************
  * @return RESTORE
  **************************************************
  **/

  public function restore($id) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $this->model::withTrashed()->findOrFail($id);
      if ($data->trashed()) {
        $data->restore();
        $data = $this->model::where('id', $id)->update(['deleted_at' => NULL]);
        return Response::json($data);
      } else { return Response::json($data);}
    }
    else {
      return Response::json($data);
    }
  }

  /**
  **************************************************
  * @return SELECTED-RESTORE
  **************************************************
  **/

  public function selected_restore(Request $request) {
    if(Auth::user()->hasRole('master-administrator|administrator')) {
      $data = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$data))->restore();
      return Response::json($data);
    }
    else {
      return Response::json($data);
    }
  }

}
