<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait StatusProgressController {

  /**
  **************************************************
  * @return STATUS-PROGRESS
  **************************************************
  **/

  public function status_progress($id) {
    $data = $this->model::where('id', $id)->update(['status' => 0]);
    return Response::json($data);
  }

}
