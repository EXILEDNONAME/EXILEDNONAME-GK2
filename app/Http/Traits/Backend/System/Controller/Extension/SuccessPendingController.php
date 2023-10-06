<?php

namespace App\Http\Traits\Backend\System\Controller\Extension;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait SuccessPendingController {

  /**
  **************************************************
  * @return STATUS-SUCCESS
  * @return STATUS-PENDING
  **************************************************
  **/

  public function status_success($id) {
    $data = $this->model::where('id', $id)->update([ 'status' => 1 ]);
    return Response::json($data);
  }

  public function status_pending($id) {
    $data = $this->model::where('id', $id)->update([ 'status' => 2 ]);
    return Response::json($data);
  }

}
