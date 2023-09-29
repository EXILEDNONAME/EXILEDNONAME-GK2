<?php

namespace App\Http\Traits\Backend\System\Controller\Extension;

use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;

trait DestroyController {

  /**
  **************************************************
  * @return DESTROY
  **************************************************
  **/

  public function destroy($id) {
    try {
      $this->model::destroy($id);
      return redirect($this->url)->with('success', __('system.notification.success.item-deleted'));
    } catch (\Exception $e) {
      return redirect($this->url)->with('error', __('system.notification.error'));
    }
  }

}
