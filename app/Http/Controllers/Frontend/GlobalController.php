<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GlobalController extends Controller {

  public function __construct(Request $request) {

    $this->url = '/schedules';
    $this->path = 'pages.frontend.schedule.';

    // CONTROLLER EVENT CONTENT CHALLENGES
    $this->date_event_content_challenge = \Carbon\Carbon::now()->format('d/m/Y');
    $this->data_event_content_challenge = \DB::table(env('DBTABLE_CONTENT_CHALLENGE'))
    ->where('COL 5', $this->date_event_content_challenge)->where(function($query) { $query
      ->where('COL 4', 'like', '%2741%')
      ->orWhere('COL 2', 'Id_Unay') // ID UNY
      ->orWhere('COL 2', '829993360') // ID MEMEI
      ->orWhere('COL 2', 'gressn'); // ID RARA
    })->get();

    // CONTROLLER EVENT CONTENT FESTIVALS
    $this->date_event_content_festival = \Carbon\Carbon::now()->format('d/m/Y');
    $this->data_event_content_festival = \DB::table(env('DBTABLE_CONTENT_FESTIVAL'))
    ->where('COL 3', $this->date_event_content_festival)->where(function($query) { $query
      ->where('COL 4', 'like', '%2741%')
      ->orWhere('COL 1', 'Id_Unay') // ID UNY
      ->orWhere('COL 1', '829993360') // ID MEMEI
      ->orWhere('COL 1', 'gressn'); // ID RARA
    })->get();

  }

  public function index() {
    return view($this->path . 'index');
  }

  public function content_challenge() {
    if (request()->ajax()) { return DataTables::of($this->data_event_content_challenge)->addIndexColumn()->make(true); }
  }

  public function content_festival() {
    if (request()->ajax()) { return DataTables::of($this->data_event_content_festival)->addIndexColumn()->make(true); }
  }

}
