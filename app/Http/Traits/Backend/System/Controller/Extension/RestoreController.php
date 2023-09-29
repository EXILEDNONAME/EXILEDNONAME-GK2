<?php

namespace App\Http\Traits\Backend\System\Controller\Extension;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait RestoreController {

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
