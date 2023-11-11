<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Response;

class DashboardController extends Controller {

  public function __construct() {
    $this->middleware('auth');
    $this->middleware(['auth', 'role:master-administrator|administrator'], ['only' => ['file_manager']]);
  }

  public function index() {
    return view('pages.backend.__system.dashboard.index');
  }

  public function file_manager() {
    return view('pages.backend.__system.file-manager.index');
  }

  public function language($language = '') {
    request()->session()->put('locale', $language);
    return redirect()->back();
  }

  public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }

}
