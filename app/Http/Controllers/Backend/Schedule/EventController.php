<?php
namespace App\Http\Controllers\Backend\Schedule;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect, Response;
use Shuchkin\SimpleXLSX;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {

    // BIGO CONTENT CHALLENGE
    $file_event_content_challenge = Storage::path('bigo-content-challenge.xlsx');
    if ($xlsx = SimpleXLSX::parse($file_event_content_challenge)) {
      $data_event_content_challenge = new \Illuminate\Database\Eloquent\Collection;
      // $date_event_content_challenge = \Carbon\Carbon::now()->format('Y-m-d');
      $date_event_content_challenge = \Carbon\Carbon::now()->translatedFormat('j F');
      // $date_event_content_challenge = "12 November";
      if ($xlsx->sheetsCount() >= 1) { $data_0 = $xlsx->rows(0); }
      if ($xlsx->sheetsCount() >= 2) { $data_1 = $xlsx->rows(1); }
      if ($xlsx->sheetsCount() >= 3) { $data_2 = $xlsx->rows(2); }
      if ($xlsx->sheetsCount() >= 4) { $data_3 = $xlsx->rows(3); }
      if ($xlsx->sheetsCount() >= 5) { $data_4 = $xlsx->rows(4); }
      if ($xlsx->sheetsCount() >= 6) { $data_4 = $xlsx->rows(5); }
      if ($xlsx->sheetsCount() >= 7) { $data_4 = $xlsx->rows(6); }
      if ($xlsx->sheetsCount() >= 8) { $data_4 = $xlsx->rows(7); }
      if ($xlsx->sheetsCount() >= 9) { $data_4 = $xlsx->rows(8); }
      if ($xlsx->sheetsCount() >= 10) { $data_4 = $xlsx->rows(9); }
      if ($xlsx->sheetsCount() >= 1) { $data_event_content_challenge = $data_event_content_challenge->concat($data_0); }
      if ($xlsx->sheetsCount() >= 2) { $data_event_content_challenge = $data_event_content_challenge->concat($data_1); }
      if ($xlsx->sheetsCount() >= 3) { $data_event_content_challenge = $data_event_content_challenge->concat($data_2); }
      if ($xlsx->sheetsCount() >= 4) { $data_event_content_challenge = $data_event_content_challenge->concat($data_3); }
      if ($xlsx->sheetsCount() >= 5) { $data_event_content_challenge = $data_event_content_challenge->concat($data_4); }
    }

    // BIGO INDONESIA CONTENT FESTIVAL
    $file_event_indonesia_content_festival = Storage::path('bigo-indonesia-content-festival.xlsx');
    if ($xlsx = SimpleXLSX::parse($file_event_indonesia_content_festival)) {
      $data_event_content_festival = new \Illuminate\Database\Eloquent\Collection;
      $date_event_content_festival = \Carbon\Carbon::now()->format('Y-m-d');
      if ($xlsx->sheetsCount() >= 1) { $data_0 = $xlsx->rows(0); }
      if ($xlsx->sheetsCount() >= 2) { $data_1 = $xlsx->rows(1); }
      if ($xlsx->sheetsCount() >= 3) { $data_2 = $xlsx->rows(2); }
      if ($xlsx->sheetsCount() >= 4) { $data_3 = $xlsx->rows(3); }
      if ($xlsx->sheetsCount() >= 5) { $data_4 = $xlsx->rows(4); }
      if ($xlsx->sheetsCount() >= 1) { $data_event_content_festival = $data_event_content_festival->concat($data_0); }
      if ($xlsx->sheetsCount() >= 2) { $data_event_content_festival = $data_event_content_festival->concat($data_1); }
      if ($xlsx->sheetsCount() >= 3) { $data_event_content_festival = $data_event_content_festival->concat($data_2); }
      if ($xlsx->sheetsCount() >= 4) { $data_event_content_festival = $data_event_content_festival->concat($data_3); }
      if ($xlsx->sheetsCount() >= 5) { $data_event_content_festival = $data_event_content_festival->concat($data_4); }
    }

    // BIGO E-COMMERCE
    $file_event_e_commerce = Storage::path('bigo-e-commerce.xlsx');
    if ($xlsx = SimpleXLSX::parse($file_event_e_commerce)) {
      $data_event_e_commerce = new \Illuminate\Database\Eloquent\Collection;
      $date_event_e_commerce = \Carbon\Carbon::now()->format('Y-m-d');
      if ($xlsx->sheetsCount() >= 1) { $data_0 = $xlsx->rows(0); }
      if ($xlsx->sheetsCount() >= 2) { $data_1 = $xlsx->rows(1); }
      if ($xlsx->sheetsCount() >= 3) { $data_2 = $xlsx->rows(2); }
      if ($xlsx->sheetsCount() >= 4) { $data_3 = $xlsx->rows(3); }
      if ($xlsx->sheetsCount() >= 5) { $data_4 = $xlsx->rows(4); }
      if ($xlsx->sheetsCount() >= 1) { $data_event_e_commerce = $data_event_e_commerce->concat($data_0); }
      if ($xlsx->sheetsCount() >= 2) { $data_event_e_commerce = $data_event_e_commerce->concat($data_1); }
      if ($xlsx->sheetsCount() >= 3) { $data_event_e_commerce = $data_event_e_commerce->concat($data_2); }
      if ($xlsx->sheetsCount() >= 4) { $data_event_e_commerce = $data_event_e_commerce->concat($data_3); }
      if ($xlsx->sheetsCount() >= 5) { $data_event_e_commerce = $data_event_e_commerce->concat($data_4); }
    }

    return view('pages.backend.schedule.event.index', compact(
      'data_event_content_challenge', 'date_event_content_challenge',
      'data_event_content_festival', 'date_event_content_festival',
      'data_event_e_commerce', 'date_event_e_commerce',
    ));
  }

  public function bigo_content_challenges() {

    // BIGO CONTENT CHALLENGE
    $file_event_content_challenge = Storage::path('bigo-content-challenge.xlsx');
    if ($xlsx = SimpleXLSX::parse($file_event_content_challenge)) {
      $data_event_content_challenge = new \Illuminate\Database\Eloquent\Collection;
      // $date_event_content_challenge = \Carbon\Carbon::now()->format('Y-m-d');
      $date_event_content_challenge = \Carbon\Carbon::now()->translatedFormat('j F');
      // $date_event_content_challenge = "12 November";
      if ($xlsx->sheetsCount() >= 1) { $data_0 = $xlsx->rows(0); }
      if ($xlsx->sheetsCount() >= 2) { $data_1 = $xlsx->rows(1); }
      if ($xlsx->sheetsCount() >= 3) { $data_2 = $xlsx->rows(2); }
      if ($xlsx->sheetsCount() >= 4) { $data_3 = $xlsx->rows(3); }
      if ($xlsx->sheetsCount() >= 5) { $data_4 = $xlsx->rows(4); }
      if ($xlsx->sheetsCount() >= 6) { $data_4 = $xlsx->rows(5); }
      if ($xlsx->sheetsCount() >= 7) { $data_4 = $xlsx->rows(6); }
      if ($xlsx->sheetsCount() >= 8) { $data_4 = $xlsx->rows(7); }
      if ($xlsx->sheetsCount() >= 9) { $data_4 = $xlsx->rows(8); }
      if ($xlsx->sheetsCount() >= 10) { $data_4 = $xlsx->rows(9); }
      if ($xlsx->sheetsCount() >= 1) { $data_event_content_challenge = $data_event_content_challenge->concat($data_0); }
      if ($xlsx->sheetsCount() >= 2) { $data_event_content_challenge = $data_event_content_challenge->concat($data_1); }
      if ($xlsx->sheetsCount() >= 3) { $data_event_content_challenge = $data_event_content_challenge->concat($data_2); }
      if ($xlsx->sheetsCount() >= 4) { $data_event_content_challenge = $data_event_content_challenge->concat($data_3); }
      if ($xlsx->sheetsCount() >= 5) { $data_event_content_challenge = $data_event_content_challenge->concat($data_4); }
    }

    return view('pages.backend.schedule.event.content.event-bigo-content-challenge', compact(
      'data_event_content_challenge', 'date_event_content_challenge',
    ));
  }

  public function get_event_content_challenge() {
    $download_event_content_challenge = "https://docs.google.com/spreadsheets/d/16zpKReBsus_4ZSUasmhFfwQ9I-OEYAtLvXT56wQr9pI/export?format=xlsx";
    $file_event_content_challenge = Storage::disk('local')->put('bigo-content-challenge.xlsx', file_get_contents($download_event_content_challenge));
    return Redirect::back();
  }

  public function get_event_indonesia_content_festival() {
    $download_event_indonesia_content_festival = "https://docs.google.com/spreadsheets/d/17cHkh45mBs_7PzKh8rsqKyf9mthUHeUPlR5nquvnLGI/export?format=xlsx";
    $file_event_indonesia_content_festival = Storage::disk('local')->put('bigo-indonesia-content-festival.xlsx', file_get_contents($download_event_indonesia_content_festival));
    return Redirect::back();
  }

  public function get_event_e_commerce() {
    $download_event_e_commerce = "https://docs.google.com/spreadsheets/d/1sTXX1PUjq0Vg310d76m1pBoWaif-Pa7hru-kZ7J0NYk/export?format=xlsx";
    $file_event_e_commerce = Storage::disk('local')->put('bigo-e-commerce.xlsx', file_get_contents($download_event_e_commerce));
    return Redirect::back();
  }

}
