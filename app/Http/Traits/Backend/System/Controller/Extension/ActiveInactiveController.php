<?php

namespace App\Http\Traits\Backend\System\Controller\Extension;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait ActiveInactiveController {

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

}
