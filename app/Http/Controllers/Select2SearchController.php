<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class Select2SearchController extends Controller
{
  public function index()
  {
    return view('__demo.select2');
  }
  public function selectSearch(Request $request)
  {
    $movies = [];
    if($request->has('q')){
      $search = $request->q;
      $movies =Movie::select("id", "name")
      ->where('name', 'LIKE', "%$search%")
      ->get();
    }
    return response()->json($movies);
  }
}
