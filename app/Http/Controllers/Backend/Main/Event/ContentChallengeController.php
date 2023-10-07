<?php

namespace App\Http\Controllers\Backend\Main\Event;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentChallengeController extends Controller {

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/events/content-challenges';
    $this->path = 'pages.backend.main.event.content-challenge.';
    $this->db = env('DBTABLE_CONTENT_CHALLENGE');
    $this->date = \Carbon\Carbon::now()->translatedFormat('j F');
    $this->data = \DB::table($this->db)
    ->where('COL 5', $this->date)->where(function($query) { $query
      ->where('COL 4', 'like', '%2741%')
      ->orWhere('COL 2', 'Id_Unay') // ID UNY
      ->orWhere('COL 2', '829993360') // ID MEMEI
      ->orWhere('COL 2', 'gressn'); // ID RARA
    })->get();
  }

  public function index() {
    if (request()->ajax()) { return DataTables::of($this->data)
      ->editColumn('COL 5', function ($order) {
        if (str_contains($order->{'COL 5'}, 'Oktober')) {
          $newtext = str_replace("Oktober", "October", $order->{'COL 5'});
          $newDate = $newtext . ' ' . \Carbon\Carbon::now()->translatedFormat('Y');
          return \Carbon\Carbon::parse($newDate)->format('d-m-Y');
        }
        else {
          $newDate = $newtext . ' ' . \Carbon\Carbon::now()->translatedFormat('Y');
          return \Carbon\Carbon::parse($newDate)->format('d-m-Y');
        }
      })

      ->addIndexColumn()->make(true); }
      return view($this->path . 'index');
    }

  }
