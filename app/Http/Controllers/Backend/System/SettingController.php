<?php

namespace App\Http\Controllers\Backend\System\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Setting;
use Auth;

class SettingController extends Controller {

  public function __construct() {
    $this->middleware('auth');
    $this->model = 'App\Models\Setting';
  }

  

}
