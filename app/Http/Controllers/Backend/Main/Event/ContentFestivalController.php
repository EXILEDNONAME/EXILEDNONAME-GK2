<?php

namespace App\Http\Controllers\Backend\Main\Event;

use Auth;
use DataTables;
use Redirect, Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentFestivalController extends Controller {

  public function __construct(Request $request) {
    $this->middleware('auth');
    $this->url = '/dashboard/events/content-festivals';
    $this->path = 'pages.backend.main.event.content-festival.';
    $this->db = env('DBTABLE_CONTENT_FESTIVAL');
    $this->date = \Carbon\Carbon::now()->format('d/m/Y');
    $this->data = \DB::table($this->db)
    ->where('COL 3', $this->date)->where(function($query) { $query
      ->where('COL 4', 'like', '%2741%')
      ->orWhere('COL 1', 'Id_Unay') // ID UNY
      ->orWhere('COL 1', '829993360') // ID MEMEI
      ->orWhere('COL 1', 'gressn'); // ID RARA
    })->get();
  }

  public function index() {
    if (request()->ajax()) { return DataTables::of($this->data)
      ->editColumn('COL 3', function ($order) { return \Carbon\Carbon::parse($order->{'COL 3'})->format('m-d-Y'); })
      ->addIndexColumn()->make(true); }
      return view($this->path . 'index');
    }

  }
