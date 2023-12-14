<?php
namespace App\Http\Controllers\Backend\Schedule;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect, Response;
use Shuchkin\SimpleXLSX;
use Illuminate\Support\Facades\Storage;

use App\Models\Backend\Schedule\IndonesiaContentFestival;

class EventController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    return view('pages.backend.schedule.event.index');
  }

  // BIGO INDONESIA CONTENT FESTIVALS
  public function get_event_indonesia_content_festival() {
    $download_event_indonesia_content_festival = "https://docs.google.com/spreadsheets/d/1yduPRH9XLjXGXlfO9Zd_ryXTBticrU3iU3ivMaT4C5I/export?format=xlsx";
    $file_event_indonesia_content_festival = Storage::disk('local')->put('bigo-indonesia-content-festival.xlsx', file_get_contents($download_event_indonesia_content_festival));
    return Redirect::back();
  }

  public function indonesia_content_festivals() {
    $data = IndonesiaContentFestival::
    where('col_3', \Carbon\Carbon::now()->format('d/m/Y'))->where(function($query) {
      $query->where('col_4','like','%2741%')
      ->orWhere('col_1', 'like', '%gressn%')
      ->orWhere('col_1', 'like', '%829993360%');
    })
    ->get();
    return view('pages.backend.schedule.event.content.event-bigo-icf-test', compact('data'));
  }

  // BIGO CONTENT CHALLENGES
  public function get_event_content_challenge() {
    $download_event_content_challenge = "https://docs.google.com/spreadsheets/d/1k8EjzNiydHOOmEW1DDZeuou6CnBY_CGYlX7QMuz9jBs/export?format=xlsx";
    $file_event_content_challenge = Storage::disk('local')->put('bigo-content-challenge.xlsx', file_get_contents($download_event_content_challenge));
    return Redirect::back();
  }

  public function content_challenges() {
    $file_event_content_challenge = Storage::path('bigo-content-challenge.xlsx');
    if ($xlsx = SimpleXLSX::parse($file_event_content_challenge)) {
      $data_event_content_challenge = new \Illuminate\Database\Eloquent\Collection;
      $date_event_content_challenge = \Carbon\Carbon::now()->format('Y-m-d');
      // $date_event_content_challenge = \Carbon\Carbon::now()->format('Y-d-m');
      // $date_event_content_challenge = \Carbon\Carbon::now()->format('d/m/Y');
      // $date_event_content_challenge = \Carbon\Carbon::now()->translatedFormat('j F');
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



  // BIGO E-COMMERCE
  public function get_event_e_commerce() {
    $download_event_e_commerce = "https://docs.google.com/spreadsheets/d/1sTXX1PUjq0Vg310d76m1pBoWaif-Pa7hru-kZ7J0NYk/export?format=xlsx";
    $file_event_e_commerce = Storage::disk('local')->put('bigo-e-commerce.xlsx', file_get_contents($download_event_e_commerce));
    return Redirect::back();
  }

  public function e_commerce() {
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
    return view('pages.backend.schedule.event.content.event-bigo-e-commerce', compact(
      'data_event_e_commerce', 'date_event_e_commerce',
    ));
  }

  // BIGO SPECIAL TALENT LIVEHOUSE
  public function get_event_special_talent_live_house() {
    $download_event_special_talent_live_house = "https://docs.google.com/spreadsheets/d/1o7iyazJmo0TeSK4qxqbcsEuZBG82W_yf7tKgL0KkTQY/export?format=xlsx";
    $file_event_special_talent_live_house = Storage::disk('local')->put('bigo-special-talent-live-house.xlsx', file_get_contents($download_event_special_talent_live_house));
    return Redirect::back();
  }

  public function special_talent_live_house() {
    $file_event_special_talent_live_house = Storage::path('bigo-special-talent-live-house.xlsx');
    if ($xlsx = SimpleXLSX::parse($file_event_special_talent_live_house)) {
      $data_event_special_talent_live_house = new \Illuminate\Database\Eloquent\Collection;
      $date_event_special_talent_live_house = \Carbon\Carbon::now()->format('Y-m-d');
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
      if ($xlsx->sheetsCount() >= 11) { $data_10 = $xlsx->rows(10); }
      if ($xlsx->sheetsCount() >= 1) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_0); }
      if ($xlsx->sheetsCount() >= 2) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_1); }
      if ($xlsx->sheetsCount() >= 3) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_2); }
      if ($xlsx->sheetsCount() >= 4) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_3); }
      if ($xlsx->sheetsCount() >= 5) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_4); }
      if ($xlsx->sheetsCount() >= 6) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_5); }
      if ($xlsx->sheetsCount() >= 7) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_6); }
      if ($xlsx->sheetsCount() >= 8) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_7); }
      if ($xlsx->sheetsCount() >= 9) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_8); }
      if ($xlsx->sheetsCount() >= 10) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_9); }
      if ($xlsx->sheetsCount() >= 11) { $data_event_special_talent_live_house = $data_event_special_talent_live_house->concat($data_10); }
    }
    return view('pages.backend.schedule.event.content.event-bigo-special-talent-live-house', compact(
      'data_event_special_talent_live_house', 'date_event_special_talent_live_house',
    ));
  }

}
