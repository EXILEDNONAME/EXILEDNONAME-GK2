<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Support\Facades\Storage;
use Shuchkin\SimpleXLSX;

use App\Models\Backend\Schedule\IndonesiaContentFestival;
use App\Models\Backend\Schedule\ContentChallenge;
use App\Models\Backend\Schedule\ECommerce;
use App\Models\Backend\Schedule\SpecialTalentLiveHouse;

class DashboardController extends Controller {

  public function __construct() {
    $this->middleware('auth');
    $this->middleware(['auth', 'role:master-administrator|administrator'], ['only' => ['file_manager']]);
  }

  public function index() {

    $file_pk_glory = Storage::path('bigo-pk-glory.xlsx');
    $file_pk_party = Storage::path('bigo-pk-party.xlsx');
    $file_pk_weekend = Storage::path('bigo-pk-weekend.xlsx');
    $file_pk_family = Storage::path('bigo-pk-family.xlsx');

    // PK GLORY
    try {
      if ($xlsx = SimpleXLSX::parse($file_pk_glory)) {
        $full_data = $xlsx->sheetNames();
        $data_sheet = array_flip($full_data);
        $sheet = $data_sheet[\Carbon\Carbon::now()->translatedFormat('j F')];
        $data_pk_epical_glory = $xlsx->rows($sheet);
      }
    } catch (\Exception $e) { $data_pk_epical_glory = ''; }

    // PK PARTY
    try {
      if ($xlsx = SimpleXLSX::parse($file_pk_party)) {
        $full_data = $xlsx->sheetNames();
        $data_sheet = array_flip($full_data);
        $sheet = $data_sheet[\Carbon\Carbon::now()->translatedFormat('j F')];
        $data_pk_party = $xlsx->rows($sheet);
      }
    } catch (\Exception $e) { $data_pk_party = ''; }

    // PK WEEKEND
    try {
      if ($xlsx = SimpleXLSX::parse($file_pk_weekend)) {
        $full_data = $xlsx->sheetNames();
        $data_sheet = array_flip($full_data);
        $sheet = $data_sheet[\Carbon\Carbon::now()->translatedFormat('j F')];
        $data_pk_weekend = $xlsx->rows($sheet);
      }
    } catch (\Exception $e) { $data_pk_weekend = ''; }

    // PK FAMILY
    try {
      if ($xlsx = SimpleXLSX::parse($file_pk_family)) {
        $full_data = $xlsx->sheetNames();
        $data_sheet = array_flip($full_data);
        $sheet = $data_sheet[\Carbon\Carbon::now()->translatedFormat('j F')];
        $data_pk_family = $xlsx->rows($sheet);
      }
    } catch (\Exception $e) { $data_pk_family = ''; }

    // ICF
    $data_event_icf = IndonesiaContentFestival::where('col_3', \Carbon\Carbon::now()->format('d/m/Y'))->where(function($query) {
      $query->where('col_4', 'like', '%2741%')
      ->orWhere('col_1', 'like', '%gressn%')
      ->orWhere('col_1', 'like', '%829993360%');
    })->get();

    if ($data_event_icf->count() == 0) { $ICF = ''; }
    else { $ICF = '1'; }

    // CONTENT CHALLENGES
    $data_event_content_challenge = ContentChallenge::where('col_3', \Carbon\Carbon::now()->format('d/m/Y'))->where(function($query) {
      $query->where('col_4', 'like', '%2741%')
      ->orWhere('col_1', 'like', '%gressn%')
      ->orWhere('col_1', 'like', '%829993360%');
    })->get();

    if ($data_event_content_challenge->count() == 0) { $ContentChallenge = ''; }
    else { $ContentChallenge = '1'; }

    // E-COMMERCE
    $data_event_e_commerce = ECommerce::where('col_4', \Carbon\Carbon::now()->format('Y-m-d'))->where(function($query) {
      $query->where('col_3', 'like', '%NEWGASSKEEN%')
      ->orWhere('col_3', 'like', '%new gasskeen%')
      ->orWhere('col_2', 'like', '%gressn%')
      ->orWhere('col_2', 'like', '%mylavs17%')
      ->orWhere('col_2', 'like', '%829993360%');
    })->get();

    if ($data_event_e_commerce->count() == 0) { $ECommerce = ''; }
    else { $ECommerce = '1'; }

    // SPECIAL TALENT LIVE HOUSE
    $data_event_special_talent_live_house = SpecialTalentLiveHouse::where('col_4', \Carbon\Carbon::now()->format('Y-m-d'))->where(function($query) {
      $query->where('col_5', 'like', '%2741%')
      ->orWhere('col_2', 'like', '%gressn%')
      ->orWhere('col_2', 'like', '%829993360%');
    })->get();

    if ($data_event_special_talent_live_house->count() == 0) { $STLH = ''; }
    else { $STLH = '1'; }

    return view('pages.backend.__system.dashboard.index', compact(
      'data_event_icf', 'ICF',
      'data_event_content_challenge', 'ContentChallenge',
      'data_event_e_commerce', 'ECommerce',
      'data_event_special_talent_live_house', 'STLH',
      'data_pk_epical_glory',
      'data_pk_party',
      'data_pk_weekend',
      'data_pk_family',
    ));
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
