<?php

namespace App\Http\Traits\Backend\System\Controller\Extension;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait DeleteController {

  /**
  **************************************************
  * @return DELETE
  * @return DELETE-ALL
  * @return DELETE-PERMANENT
  * @return DELETE-PERMANENT-ALL
  **************************************************
  **/

  public function delete($id) {
    $this->model::destroy($id);
    $data = $this->model::where('id', $id)->delete();
    return Response::json($data);
  }

  public function deleteall(Request $request) {
    $exilednoname = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$exilednoname))->delete();
    return Response::json($exilednoname);
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

}
