<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Support\Facades\Storage;
use Shuchkin\SimpleXLSX;

class DashboardController extends Controller {

  public function __construct() {
    $this->middleware('auth');
    $this->middleware(['auth', 'role:master-administrator|administrator'], ['only' => ['file_manager']]);
  }

  public function index() {
    $file_pk_epical_glory = Storage::path('bigo-pk-epical-glory-test.xlsx');
    $file_pk_party = Storage::path('bigo-pk-party-test.xlsx');
    $file_pk_weekend = Storage::path('bigo-pk-weekend-test.xlsx');

    if ($xlsx = SimpleXLSX::parse($file_pk_epical_glory) ) {
      $full_data = $xlsx->sheetNames();
      $data_sheet = array_flip($full_data);
      $sheet = $data_sheet[env('SHEET_PK_EPICAL_GLORY')];
      $data_pk_epical_glory = $xlsx->rows($sheet);
    }
    if ($xlsx = SimpleXLSX::parse($file_pk_party) ) {
      $full_data = $xlsx->sheetNames();
      $data_sheet = array_flip($full_data);
      $sheet = $data_sheet[\Carbon\Carbon::now()->translatedFormat('j F')];
      $data_pk_party = $xlsx->rows($sheet);
    }
    if ($xlsx = SimpleXLSX::parse($file_pk_weekend) ) {
      $full_data = $xlsx->sheetNames();
      $data_sheet = array_flip($full_data);
      $sheet = $data_sheet[env('SHEET_PK_WEEKEND')];
      $data_pk_weekend = $xlsx->rows($sheet);
    }

    return view('pages.backend.__system.dashboard.index', compact('data_pk_epical_glory', 'data_pk_party', 'data_pk_weekend'));
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
