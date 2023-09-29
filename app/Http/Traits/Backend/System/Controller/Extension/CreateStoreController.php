<?php

namespace App\Http\Traits\Backend\System\Controller\Extension;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait CreateStoreController {

  /**
  **************************************************
  * @return CREATE
  **************************************************
  **/

  public function create() {
    $path = $this->path;
    $model = $this->model;
    return view($this->path . 'create', compact('path', 'model'));
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    $validated = $request->validate($this->StoreRequest);
    $store = $request->all();
    $this->model::create($store);
    return redirect($this->url)->with('success', __('system.notification.success.item-created'));
  }

}
