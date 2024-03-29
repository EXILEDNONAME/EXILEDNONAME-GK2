<?php

namespace App\Http\Controllers\Backend\Controller;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\ImportIndonesiaContentFestival;
use App\Models\Backend\Schedule\IndonesiaContentFestival;
use App\Imports\ImportContentChallenge;
use App\Models\Backend\Schedule\ContentChallenge;
use App\Imports\ImportSpecialTalentLiveHouse;
use App\Models\Backend\Schedule\SpecialTalentLiveHouse;

use App\Imports\ImportECommerce;
use App\Models\Backend\Schedule\ECommerce;

class DashboardController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware(['auth', 'role:master-administrator']);
    $this->model = 'App\Models\Backend\Controller\Dashboard';
    $this->path = 'pages.backend.controller.dashboard.';
    $this->url = '/dashboard/controllers/dashboard';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];
    require_once app_path() . '/Helpers/__System/Controllers/DefaultSortController.php';
  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    $sort = $this->sort;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('file_modified', function ($order) {
        if ($order->file != null) { return date("d F Y", filemtime(Storage::path($order->file))) . "<br>" . date("H:i:s", filemtime(Storage::path($order->file))); }
        else { return '-'; }
      })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'file_modified'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model', 'sort'));
  }

  /**
  **************************************************
  * @return SYNCHRONIZATION
  **************************************************
  **/

  public function synchronization($id) {
    $data = $this->model::where('id', $id)->first();

    if($data->name == 'EVENT INDONESIA CONTENT FESTIVALS') {
      $download_event_indonesia_content_festival = $data->url_synchronization . "/export?format=csv";
      $file_event_indonesia_content_festival = Storage::disk('local')->put('csv-bigo-event-indonesia-content-festival.csv', file_get_contents($download_event_indonesia_content_festival));
      $file_event_indonesia_content_festival = Storage::path('csv-bigo-event-indonesia-content-festival.csv');
      $reset_file_event_indonesia_content_festival = IndonesiaContentFestival::truncate();
      Excel::import(new ImportIndonesiaContentFestival, $file_event_indonesia_content_festival);
    }
    if($data->name == 'EVENT CONTENT CHALLENGES') {
      $download_event_content_challenge = $data->url_synchronization . "/export?format=csv";
      $file_event_content_challenge = Storage::disk('local')->put('csv-bigo-event-content-challenge.csv', file_get_contents($download_event_content_challenge));
      $file_event_content_challenge = Storage::path('csv-bigo-event-content-challenge.csv');
      $reset_file_event_content_challenge = ContentChallenge::truncate();
      Excel::import(new ImportContentChallenge, $file_event_content_challenge);
    }
    if($data->name == 'EVENT SPECIAL TALENT LIVE HOUSE') {
      $download_event_special_talent_live_house = $data->url_synchronization . "/export?format=csv";
      $file_event_special_talent_live_house = Storage::disk('local')->put('csv-bigo-event-special-talent-live-house.csv', file_get_contents($download_event_special_talent_live_house));
      $file_event_special_talent_live_house = Storage::path('csv-bigo-event-special-talent-live-house.csv');
      $reset_file_event_special_talent_live_house = SpecialTalentLiveHouse::truncate();
      Excel::import(new ImportSpecialTalentLiveHouse, $file_event_special_talent_live_house);
    }

    if($data->name == 'EVENT E-COMMERCE') {
      $download_event_e_commerce = $data->url_synchronization . "/export?format=csv";
      $file_event_e_commerce = Storage::disk('local')->put('csv-bigo-event-e-commerce.csv', file_get_contents($download_event_e_commerce));
      $file_event_e_commerce = Storage::path('csv-bigo-event-e-commerce.csv');
      $reset_event_e_commerce = ECommerce::truncate();
      Excel::import(new ImportECommerce, $file_event_e_commerce);
    }

    if($data->name == 'PK EPICAL GLORY') {
      $download_pk_glory = $data->url_synchronization . "/export?format=xlsx";
      $file_pk_glory = Storage::disk('local')->put('bigo-pk-glory.xlsx', file_get_contents($download_pk_glory));
    }
    if($data->name == 'PK PARTY') {
      $download_pk_party = $data->url_synchronization . "/export?format=xlsx";
      $file_pk_party = Storage::disk('local')->put('bigo-pk-party.xlsx', file_get_contents($download_pk_party));
    }
    if($data->name == 'PK WEEKEND') {
      $download_pk_weekend = $data->url_synchronization . "/export?format=xlsx";
      $file_pk_weekend = Storage::disk('local')->put('bigo-pk-weekend.xlsx', file_get_contents($download_pk_weekend));
    }
    if($data->name == 'PK FAMILY') {
      $download_pk_family = $data->url_synchronization . "/export?format=xlsx";
      $file_pk_family = Storage::disk('local')->put('bigo-pk-family.xlsx', file_get_contents($download_pk_family));
    }
    return Response::json($data);
  }

}
