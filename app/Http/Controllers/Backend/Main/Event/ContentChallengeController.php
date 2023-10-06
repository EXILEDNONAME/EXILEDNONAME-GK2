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
    $this->data = \DB::table($this->db)->where('COL 5', 'like', '%' . $this->date . '%')->where('COL 4', 'like', '%2741')->get();
  }

  public function index() {
    if (request()->ajax()) { return DataTables::of($this->data)->addIndexColumn()->make(true); }
    return view($this->path . 'index');
  }

}
