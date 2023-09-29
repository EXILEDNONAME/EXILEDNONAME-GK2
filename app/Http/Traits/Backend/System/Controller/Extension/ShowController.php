<?php

namespace App\Http\Traits\Backend\System\Controller\Extension;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait ShowController {

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

}
