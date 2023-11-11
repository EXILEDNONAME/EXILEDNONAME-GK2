<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait StatusPendingController {

  /**
  **************************************************
  * @return STATUS-PENDING
  **************************************************
  **/

  public function status_pending($id) {
    $data = $this->model::where('id', $id)->update(['status' => 2]);
    return Response::json($data);
  }

}
