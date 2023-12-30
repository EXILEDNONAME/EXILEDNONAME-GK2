<?php

namespace App\Http\Controllers\Backend\Agency;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Shuchkin\SimpleXLSX;

class ReportController extends Controller {

  use DefaultController;

  public function __construct() {
    $this->middleware('auth');
  }

  public function index() {
    $file_2023_12 = Storage::path('agency/2023-12.xlsx');
    try {
      if ($xlsx = SimpleXLSX::parse($file_2023_12)) {
        $data_2023_12 = new \Illuminate\Database\Eloquent\Collection;
        $data_2023_12 = $xlsx->rows();
      }
    } catch (\Exception $e) { $data_2023_12 = ''; }

    return view('pages.backend.agency.report.index', compact('data_2023_12'));
  }

  public function index_YM($slug) {
    $file = Storage::path('agency/' . $slug . '.xlsx');
    try {
      if ($xlsx = SimpleXLSX::parse($file)) {
        $slug = new \Illuminate\Database\Eloquent\Collection;
        $slug = $xlsx->rows();
      }
    } catch (\Exception $e) { $slug = ''; }

    foreach ( $slug as $key => $category) {

      return $category[1];
      
    }


    return view('pages.backend.agency.report.index', compact('slug'));
  }

}
