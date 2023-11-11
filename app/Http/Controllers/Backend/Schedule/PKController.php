<?php
namespace App\Http\Controllers\Backend\Schedule;

use DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect, Response;
use Shuchkin\SimpleXLSX;
use Illuminate\Support\Facades\Storage;

class PKController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    $file_pk_weekend_1 = Storage::path('bigo-pk-weekend.xlsx');
    $file_pk_weekend_2 = Storage::path('bigo-pk-weekend.xlsx');

    if ($xlsx = SimpleXLSX::parse($file_pk_weekend_1) ) {
      $full_data = $xlsx->sheetNames();
      $data_flip_1 = array_flip($full_data);
      $data_flip_2 = $data_flip_1[env('SHEET_PK_WEEKEND_1')];
      $data_pk_weekend_1 = $xlsx->rows($data_flip_2);
    }
    if ($xlsx = SimpleXLSX::parse($file_pk_weekend_2) ) {
      $full_data = $xlsx->sheetNames();
      $data_flip_1 = array_flip($full_data);
      $data_flip_2 = $data_flip_1[env('SHEET_PK_WEEKEND_2')];
      $data_pk_weekend_2 = $xlsx->rows($data_flip_2);
    }

    return view('pages.backend.schedule.pk.index', compact('data_pk_weekend_1', 'data_pk_weekend_2'));
  }

  public function get_pk_weekend() {
    $download_pk_weekend = "https://docs.google.com/spreadsheets/d/1a5np5Cs8V-wmPgJEw2yPCIAGBnHbCts1HjtcOEB3uvQ/export?format=xlsx";
    Storage::disk('local')->put('bigo-pk-weekend.xlsx', file_get_contents($download_pk_weekend));
    return Redirect::back();
  }

}
