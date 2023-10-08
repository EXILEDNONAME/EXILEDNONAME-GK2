<?php

namespace App\Http\Controllers\Backend\Main\PK;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PartyController extends Controller {

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/pk/party';
    $this->path = 'pages.backend.main.pk.party.';
    $this->db = env('DBTABLE_PK_PARTY');
    $this->date = \Carbon\Carbon::now()->format('d/m/Y');
    // $this->data = \DB::table($this->db)->get();
    $this->data =
    \DB::table($this->db)->where(function($query) { $query
      ->where('COL 5', 'like', '%ᴳᴷ%')
      ->orWhere('COL 15', 'like', '%ᴳᴷ%');
    })->get();
    $this->first = \DB::table($this->db)->first();
  }

  public function index() {
    if (request()->ajax()) { return DataTables::of($this->data)
      ->editColumn('event', function ($order) { return $this->first->{'COL 1'}; })
      ->editColumn('COL 2', function ($order) { return \Carbon\Carbon::parse($order->{'COL 2'})->format('H:i'); })
      ->addIndexColumn()->make(true); }
      return view($this->path . 'index');
    }

  }
