<?php

namespace App\Http\Controllers\Backend\Main\PK;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EpicalGloryController extends Controller {

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/pk/epical-glory';
    $this->path = 'pages.backend.main.pk.epical-glory.';
    $this->db = env('DBTABLE_PK_EPICAL_GLORY');
    $this->date = \Carbon\Carbon::now()->format('d/m/Y');
    $this->data =
    \DB::table($this->db)->where(function($query) { $query
      ->where('COL 3', 'like', '%ᴳᴷ%')
      ->orWhere('COL 14', 'like', '%ᴳᴷ%');
    })->get();

    // \DB::table($this->db)->where('COL 3', 'like', '%ᴳᴷ%')->get();
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
