<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait CreateController {

  /**
  **************************************************
  * @return CREATE
  **************************************************
  **/

  public function create() {
    $path = $this->path;
    return view($this->path . 'create', compact('path'));
  }

}
