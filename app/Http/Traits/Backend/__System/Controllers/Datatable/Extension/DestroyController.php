<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait DestroyController {

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    try {
      $this->model::destroy($id);
      return redirect($this->url)->with('success', __('default.notification.success.item-deleted'));
    } catch (\Exception $e) {
      return redirect($this->url)->with('error', __('default.notification.error'));
    }
  }

}
