<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\Main\Family\Member;

class SearchMemberController extends Controller {

  public function index(Request $request) {
    $data = Member::paginate(20);
    return view('pages.frontend.search-member.index', compact('data'));
  }

  public function show($slug){
    $data = Member::where('id_bigo', $slug)->first();
    return response()->json($data);
  }

}
