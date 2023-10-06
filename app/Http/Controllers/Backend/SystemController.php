<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use Auth;

class SystemController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  /**
  **************************************************
  * @return Index
  **************************************************
  **/

  public function dashboard() {
    return view('pages.backend.dashboard');
  }

  /**
  **************************************************
  * @return File-Manager
  **************************************************
  **/

  public function file_manager() {
    return view('pages.backend.system.file-manager');
  }

  /**
  **************************************************
  * @return Language-Switcher
  **************************************************
  **/

  public function language($language = '') {
    request()->session()->put('locale', $language);
    return redirect()->back();
  }

  /**
  **************************************************
  * @return Profile
  * @return Profile-Overview
  **************************************************
  **/

  public function profile(Request $request) {
    $data = User::where('username', Auth::User()->username)->first();
    return view('pages.backend.system.profile', compact('data'));
  }

  /**
  **************************************************
  * @return Customizations
  **************************************************
  **/

  public function customization() {
    $data = \App\Models\Backend\SystemSetting::first();
    return view('pages.backend.system.setting.customization.index', compact('data'));
  }

  public function customization_update(Request $request, $id) {
    \App\Models\Backend\SystemSetting::where('id', $id)->update([
      'name' => $request->get('name'),
      'sticky' => $request->get('sticky'),
      'version' => $request->get('version'),
    ]);
    return redirect('/dashboard/settings/customizations')->with('success', __('system.notification.success.setting-updated'));
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
