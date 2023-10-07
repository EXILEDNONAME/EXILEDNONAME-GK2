<?php

namespace App\Http\Controllers\Backend\Main\Event;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialTalentLiveHouseController extends Controller {

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/events/special-talent-live-house';
    $this->path = 'pages.backend.main.event.special-talent-live-house.';
    $this->db = env('DBTABLE_SPECIAL_TALENT_LIVE_HOUSE');
    $this->date = \Carbon\Carbon::now()->format('Y-m-d');
    $this->data =
    \DB::table($this->db)
    ->where('COL 4', $this->date)->where(function($query) { $query
      ->where('COL 5', 'like', '%2741%')
      ->orWhere('COL 2', 'Id_Unay') // ID UNY
      ->orWhere('COL 2', '829993360') // ID MEMEI
      ->orWhere('COL 2', 'gressn'); // ID RARA
    })->get();
  }

  public function index() {
    if (request()->ajax()) { return DataTables::of($this->data)
      ->editColumn('COL 4', function ($order) { return \Carbon\Carbon::parse($order->{'COL 4'})->format('d-m-Y'); })
      ->addIndexColumn()->make(true); }
      return view($this->path . 'index');
    }

  }
