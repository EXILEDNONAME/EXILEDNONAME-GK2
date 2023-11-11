<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Family\Member;

class SearchMemberController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

  public function index(Request $request) {
    $data = Member::paginate(20);
    return view('pages.backend.search-member.index', compact('data'));
  }

  public function show($slug){
    $data = Member::where('id_bigo', $slug)->first();
    return response()->json($data);
  }

}
