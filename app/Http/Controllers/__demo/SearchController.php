<?php
namespace App\Http\Controllers\__demo;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class SearchController extends Controller {

  public function index(Request $request) {
    $data = User::paginate(20);
    return view('__demo.search.index', compact('data'));
  }

  public function show($slug){
    $data = User::where('username', $slug)->first();
    return response()->json($data);
  }

}
