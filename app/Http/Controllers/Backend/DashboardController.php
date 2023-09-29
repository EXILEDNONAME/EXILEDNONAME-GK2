<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use Auth;

class DashboardController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  /**
  **************************************************
  * @return Index
  **************************************************
  **/

  public function index() {
    return view('pages.backend.system.dashboard');
  }

  /**
  **************************************************
  * @return Logout
  **************************************************
  **/

  public function logout() {
    Auth::logout();
    return redirect('login');
  }
}
