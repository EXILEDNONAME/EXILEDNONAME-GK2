<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Access;
use Shuchkin\SimpleXLSX;
use Illuminate\Support\Facades\Storage;

class SchedulePKController extends Controller {

  public function get_event_content_challenges() {
    $download_event_content_challenge = "https://docs.google.com/spreadsheets/d/16zpKReBsus_4ZSUasmhFfwQ9I-OEYAtLvXT56wQr9pI/export?format=xlsx";
    Storage::disk('local')->put('bigo-content-challenge.xlsx', file_get_contents($download_event_content_challenge));
    return Redirect::back();
  }

  public function pk_party() {
    $file_pk_party = Storage::path('bigo-pk-party.xlsx');

    // PK PARTY
    if ( $xlsx = SimpleXLSX::parse($file_pk_party) ) {
      $full_data = $xlsx->sheetNames();
      $data_flip_1 = array_flip($full_data);
      $data_flip2 = $data_flip_1[env('DATE_PK_PARTY')];
      $data_pk_party = $xlsx->rows($data_flip2);
    }

    // return view('pages.frontend.schedule.pk.party', compact('data_pk_party'));
    return view('navigation', compact('data_pk_party'));

  }

}
