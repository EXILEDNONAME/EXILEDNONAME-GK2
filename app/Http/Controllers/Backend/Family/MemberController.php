<?php

namespace App\Http\Controllers\Backend\Family;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use DataTables;
use Illuminate\Http\Request;

class MemberController extends Controller {

  use DefaultController;

  function __construct() {
    $this->middleware(['auth', 'role:master-administrator|administrator-family']);
    $this->model = 'App\Models\Backend\Family\Member';
    $this->path = 'pages.backend.family.member.';
    $this->url = '/dashboard/family/members';
    $this->sort = 1;
    $this->RequestStore = [];
    $this->RequestUpdate = [];

    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::orderby('active', 'desc')->get(); }
  }

}
