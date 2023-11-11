<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

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
