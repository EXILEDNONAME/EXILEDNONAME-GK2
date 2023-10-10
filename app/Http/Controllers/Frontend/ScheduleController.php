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

class ScheduleController extends Controller {

  public function index() {

    // $download_event_content_challenge = "https://docs.google.com/spreadsheets/d/16zpKReBsus_4ZSUasmhFfwQ9I-OEYAtLvXT56wQr9pI/export?format=xlsx";
    // Storage::disk('local')->put('bigo-content-challenge.xlsx', file_get_contents($download_event_content_challenge));
    $file_event_content_challenge = Storage::path('bigo-content-challenge.xlsx');

    // $download_event_content_festival = "https://docs.google.com/spreadsheets/d/17cHkh45mBs_7PzKh8rsqKyf9mthUHeUPlR5nquvnLGI/export?format=xlsx";
    // Storage::disk('local')->put('bigo-content-festival.xlsx', file_get_contents($download_event_content_festival));
    $file_event_content_festival = Storage::path('bigo-content-festival.xlsx');

    // CONTENT CHALLENGE
    if ( $xlsx = SimpleXLSX::parse($file_event_content_challenge) ) {

      $data_event_content_challenge = new \Illuminate\Database\Eloquent\Collection;
      $date_event_content_challenge = \Carbon\Carbon::now()->translatedFormat('j F');

      if ($xlsx->sheetsCount() >= 1) { $data_0 = $xlsx->rows(0); }
      if ($xlsx->sheetsCount() >= 2) { $data_1 = $xlsx->rows(1); }
      if ($xlsx->sheetsCount() >= 3) { $data_2 = $xlsx->rows(2); }
      if ($xlsx->sheetsCount() >= 4) { $data_3 = $xlsx->rows(3); }
      if ($xlsx->sheetsCount() >= 5) { $data_4 = $xlsx->rows(4); }
      if ($xlsx->sheetsCount() >= 6) { $data_5 = $xlsx->rows(5); }
      if ($xlsx->sheetsCount() >= 7) { $data_6 = $xlsx->rows(6); }
      if ($xlsx->sheetsCount() >= 8) { $data_7 = $xlsx->rows(7); }
      if ($xlsx->sheetsCount() >= 9) { $data_8 = $xlsx->rows(8); }
      if ($xlsx->sheetsCount() >= 10) { $data_9 = $xlsx->rows(9); }

      if ($xlsx->sheetsCount() >= 1) { $data_event_content_challenge = $data_event_content_challenge->concat($data_0); }
      if ($xlsx->sheetsCount() >= 2) { $data_event_content_challenge = $data_event_content_challenge->concat($data_1); }
      if ($xlsx->sheetsCount() >= 3) { $data_event_content_challenge = $data_event_content_challenge->concat($data_2); }
      if ($xlsx->sheetsCount() >= 4) { $data_event_content_challenge = $data_event_content_challenge->concat($data_3); }
      if ($xlsx->sheetsCount() >= 5) { $data_event_content_challenge = $data_event_content_challenge->concat($data_4); }
      if ($xlsx->sheetsCount() >= 6) { $data_event_content_challenge = $data_event_content_challenge->concat($data_5); }
      if ($xlsx->sheetsCount() >= 7) { $data_event_content_challenge = $data_event_content_challenge->concat($data_6); }
      if ($xlsx->sheetsCount() >= 8) { $data_event_content_challenge = $data_event_content_challenge->concat($data_7); }
      if ($xlsx->sheetsCount() >= 9) { $data_event_content_challenge = $data_event_content_challenge->concat($data_8); }
      if ($xlsx->sheetsCount() >= 10) { $data_event_content_challenge = $data_event_content_challenge->concat($data_9); }
    }

    // CONTENT FESTIVAL
    if ( $xlsx = SimpleXLSX::parse($file_event_content_festival) ) {

      $data_event_content_festival = new \Illuminate\Database\Eloquent\Collection;
      $date_event_content_festival = \Carbon\Carbon::now()->format('Y-m-d');

      if ($xlsx->sheetsCount() >= 1) { $data_0 = $xlsx->rows(0); }
      if ($xlsx->sheetsCount() >= 2) { $data_1 = $xlsx->rows(1); }
      if ($xlsx->sheetsCount() >= 3) { $data_2 = $xlsx->rows(2); }
      if ($xlsx->sheetsCount() >= 4) { $data_3 = $xlsx->rows(3); }
      if ($xlsx->sheetsCount() >= 5) { $data_4 = $xlsx->rows(4); }
      if ($xlsx->sheetsCount() >= 6) { $data_5 = $xlsx->rows(5); }
      if ($xlsx->sheetsCount() >= 7) { $data_6 = $xlsx->rows(6); }
      if ($xlsx->sheetsCount() >= 8) { $data_7 = $xlsx->rows(7); }
      if ($xlsx->sheetsCount() >= 9) { $data_8 = $xlsx->rows(8); }
      if ($xlsx->sheetsCount() >= 10) { $data_9 = $xlsx->rows(9); }

      if ($xlsx->sheetsCount() >= 1) { $data_event_content_festival = $data_event_content_festival->concat($data_0); }
      if ($xlsx->sheetsCount() >= 2) { $data_event_content_festival = $data_event_content_festival->concat($data_1); }
      if ($xlsx->sheetsCount() >= 3) { $data_event_content_festival = $data_event_content_festival->concat($data_2); }
      if ($xlsx->sheetsCount() >= 4) { $data_event_content_festival = $data_event_content_festival->concat($data_3); }
      if ($xlsx->sheetsCount() >= 5) { $data_event_content_festival = $data_event_content_festival->concat($data_4); }
      if ($xlsx->sheetsCount() >= 6) { $data_event_content_festival = $data_event_content_festival->concat($data_5); }
      if ($xlsx->sheetsCount() >= 7) { $data_event_content_festival = $data_event_content_festival->concat($data_6); }
      if ($xlsx->sheetsCount() >= 8) { $data_event_content_festival = $data_event_content_festival->concat($data_7); }
      if ($xlsx->sheetsCount() >= 9) { $data_event_content_festival = $data_event_content_festival->concat($data_8); }
      if ($xlsx->sheetsCount() >= 10) { $data_event_content_festival = $data_event_content_festival->concat($data_9); }
    }
    return view('test', compact('data_event_content_challenge', 'date_event_content_challenge', 'data_event_content_festival', 'date_event_content_festival'));

  }

}
