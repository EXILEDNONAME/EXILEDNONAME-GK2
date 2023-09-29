<?php
namespace App\Http\Traits\Backend\System;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait DefaultRestrictController {

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
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'action'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return SHOW
  **************************************************
  **/

  public function show($id) {
    $model = $this->model;
    $data = $this->model::findOrFail($id);
    return view($this->path . 'show', compact('data', 'model'));
  }

  /**
  **************************************************
  * @return CREATE
  **************************************************
  **/

  public function create() {
    $path = $this->path;
    $model = $this->model;
    return view($this->path . 'create', compact('path', 'model'));
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    $validated = $request->validate($this->StoreRequest);
    $store = $request->all();
    $this->model::create($store);
    return redirect($this->url)->with('success', __('system.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return EDIT
  **************************************************
  **/

  public function edit($id) {
    $path = $this->path;
    $model = $this->model;
    $data = $this->model::findOrFail($id);
    return view($this->path . 'edit', compact('path', 'data', 'model'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    if ($id == 1) { return redirect($this->url)->with('error', __('system.notification.error.restrict')); }
    else {
      $data = $this->model::findOrFail($id);
      $validated = $request->validate($this->UpdateRequest);
      $update = $request->all();
      $data->update($update);
    }
    return redirect($this->url)->with('success', __('system.notification.success.item-updated'));
  }

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    if ($id == 1) { return redirect($this->url)->with('error', __('system.notification.error.restrict')); }
    else {
      try {
        $this->model::destroy($id);
        return redirect($this->url)->with('success', __('system.notification.success.item-deleted'));
      } catch (\Exception $e) {
        return redirect($this->url)->with('error', __('system.notification.error'));
      }
    }
  }

  /**
  **************************************************
  * @return ACTIVE
  * @return INACTIVE
  **************************************************
  **/

  public function active($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 1 ]);
    return Response::json($data);
  }

  public function inactive($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 2 ]);
    return Response::json($data);
  }

  /**
  **************************************************
  * @return DELETE
  * @return DELETE-ALL
  * @return DELETE-PERMANENT
  * @return DELETE-PERMANENT-ALL
  **************************************************
  **/

  public function delete($id) {
    if ($id == 1) { return Response::json($data); }
    else {
      $this->model::destroy($id);
      $data = $this->model::where('id',$id)->delete();
      return Response::json($data);
    }
  }

  public function deleteall(Request $request) {
    if ($request->EXILEDNONAME == 1) {
      return Response::json($data);
    }
    else {
      $exilednoname = $request->EXILEDNONAME;
      $this->model::whereIn('id',explode(",",$exilednoname))->delete();
      return Response::json($exilednoname);
    }
  }

  public function delete_permanent($id) {
    $data = $this->model::withTrashed()->findOrFail($id);
    if(!$data->trashed()) { return Response::json($data); }
    else {
      $data->forceDelete();
      return Response::json($data);
    }
  }

  public function delete_permanentall(Request $request) {
    $exilednoname = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$exilednoname))->forceDelete();
    return Response::json($exilednoname);
  }

  /**
  **************************************************
  * @return RESTORE
  * @return RESTORE-ALL
  * @return TRASH
  **************************************************
  **/

  public function restore($id) {
    $data = $this->model::withTrashed()->findOrFail($id);
    if ($data->trashed()) {
      $data->restore();
      $data = $this->model::where('id', $id)->update(['deleted_at' => NULL]);
      return Response::json($data);
    } else { return Response::json($data);}
  }

  public function restoreall(Request $request) {
    $exilednoname = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$exilednoname))->restore();
    return Response::json($exilednoname);
  }

  public function trash() {
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

}
