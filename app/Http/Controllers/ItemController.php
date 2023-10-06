<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Item;
use App\Jobs\ItemCSVUploadJob;

class ItemController extends Controller
{
  public function index()
  {
    return view('__demo.csv.index');
  }

  public function upload_csv_file(Request $request)
  {
    if( $request->has('csv') ) {

      $csv    = file($request->csv);
      $chunks = array_chunk($csv,1000);
      $header = [];

      foreach ($chunks as $key => $chunk) {
        $data = array_map('str_getcsv', $chunk);
        if($key == 0){
          $header = $data[0];
          unset($data[0]);
        }

        ItemCSVUploadJob::dispatch($data, $header);
      }

    }
    return redirect()->back();
  }
}
