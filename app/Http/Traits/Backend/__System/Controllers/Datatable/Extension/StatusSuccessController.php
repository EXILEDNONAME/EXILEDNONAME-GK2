<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait StatusSuccessController {

  /**
  **************************************************
  * @return STATUS-SUCCESS
  **************************************************
  **/

  public function status_success($id) {
    $data = $this->model::where('id', $id)->update(['status' => 1]);
    return Response::json($data);
  }

}
