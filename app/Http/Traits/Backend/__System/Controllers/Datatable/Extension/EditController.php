<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait EditController {

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

}
