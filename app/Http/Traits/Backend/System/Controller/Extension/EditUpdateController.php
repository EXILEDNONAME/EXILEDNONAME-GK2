<?php

namespace App\Http\Traits\Backend\System\Controller\Extension;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait EditUpdateController {

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

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    $data = $this->model::findOrFail($id);
    $validated = $request->validate($this->UpdateRequest);
    $update = $request->all();
    $data->update($update);
    return redirect($this->url)->with('success', __('system.notification.success.item-updated'));
  }

}
