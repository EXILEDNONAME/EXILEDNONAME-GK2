@extends('layouts.default', ['page' => 'dashboard'])
@section('title', 'Dashboard')

@section('content')
@php $pk_epical_glory = DB::table('dashboard_items')->where('name', 'PK EPICAL GLORY')->first(); @endphp
@php $pk_party = DB::table('dashboard_items')->where('name', 'PK PARTY')->first(); @endphp
@php $pk_weekend = DB::table('dashboard_items')->where('name', 'PK WEEKEND')->first(); @endphp

@php $event_icf = DB::table('dashboard_items')->where('name', 'EVENT INDONESIA CONTENT FESTIVALS')->first(); @endphp
@php $event_content_challenge = DB::table('dashboard_items')->where('name', 'EVENT CONTENT CHALLENGES')->first(); @endphp
@php $event_e_commerce = DB::table('dashboard_items')->where('name', 'EVENT E-COMMERCE')->first(); @endphp
@php $event_stlh = DB::table('dashboard_items')->where('name', 'EVENT SPECIAL TALENT LIVE HOUSE')->first(); @endphp

<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> SERVER PUSH ICF </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/create" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.create') }}"><i class="fas fa-plus"></i></a>
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <div data-toggle="collapse" data-target="#collapse-filter" aria-expanded="true"><a class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.filter./') }}"><i class="fas fa-filter"></i></a></div>
          <div class="dropdown dropdown-inline" bis_skin_checked="1">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" bis_skin_checked="1">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.copy') }}"><a href="javascript:void(0);" class="navi-link" id="export_copy"><i class="navi-icon fa fa-copy"></i> {{ __('default.label.export.copy') }} </a></li>
                <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.excel') }}"><a href="javascript:void(0);" class="navi-link" id="export_excel"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }} </a></li>
                <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.pdf') }}"><a href="javascript:void(0);" class="navi-link" id="export_pdf"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }} </a></li>
                <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.print') }}"><a href="javascript:void(0);" class="navi-link" id="export_print"><i class="navi-icon fa fa-print"></i> {{ __('default.label.export.print') }} </a></li>
              </ul>
            </div>
          </div>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
          <div id="collapse_bulk" class="collapse">
            <div class="dropdown">
              <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                <a class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-toggle="tooltip" data-original-title="{{ __('default.label.action') }}"><i class="fas fa-ellipsis-h"></i></a>
              </div>
              <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                <ul class="navi navi-hover py-4">
                  @if (empty($active) || $active == 'true')
                  <li class="navi-item"> <a href="javascript:void(0);" class="navi-link selected-active"> {{ __('default.label.selected-active') }} </a></li>
                  <li class="navi-item"> <a href="javascript:void(0);" class="navi-link selected-inactive"> {{ __('default.label.selected-inactive') }} </a></li>
                  @endif
                  <li class="navi-item"> <a href="javascript:void(0);" class="navi-link selected-delete"> {{ __('default.label.selected-delete') }} </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body" id="exilednoname_body">

        <div class="table-responsive">
          <div class="table-responsive">
            <table width="100%" class="table table-bordered table-checkable" id="exilednoname_table">
              <tr class="text-nowrap">
                <td class="align-middle font-weight-bold"> NO </td>
                <td class="align-middle font-weight-bold"> NAME </td>
                <td class="align-middle font-weight-bold"> STATUS </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle"> 1 </td>
                <td class="align-middle"> SERVER 1 </td>
                <td class="align-middle"> ONLINE </td>
              </tr>
              <tr class="text-nowrap">
                <td class="align-middle"> 2 </td>
                <td class="align-middle"> SERVER 2 </td>
                <td class="align-middle"> ONLINE </td>
              </tr>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-info gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_event_icf" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          SERVER 1 <br>
          ONLINE
        </a>
      </div>
    </div>
  </div>

  <!-- INDONESIA CONTENT FESTIVALS -->
  @if($ICF == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-info gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_event_icf" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          ICF <br>
          INDONESIA CONTENT FESTIVALS
        </a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_event_icf" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="4" width="20%"> INDONESIA CONTENT FESTIVALS (ICF) </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_event_icf as $data_event_icf)
                <tr>
                  <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_icf->col_6 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_icf->col_2 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="200px">
                    @php $username = \DB::table('family_members')->where('id_bigo', $data_event_icf->col_2)->first(); @endphp
                    @if($username) {{ $username->name }} @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- CONTENT CHALLENGES -->
  @if($ContentChallenge == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-warning gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_event_content_challenge" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          CONTENT <br>
          CHALLENGES
        </a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_event_content_challenge" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="4" width="20%"> CONTENT CHALLENGES </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_event_content_challenge as $data_event_content_challenge)
                <tr>
                  <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_content_challenge->col_5 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_content_challenge->col_1 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="200px">
                    @php $username = \DB::table('family_members')->where('id_bigo', $data_event_content_challenge->col_1)->first(); @endphp
                    @if($username) {{ $username->name }} @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- E-COMMERCE -->
  @if($ECommerce == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-success gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_event_e_commerce" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br>
          E-COMMERCE
        </a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_event_e_commerce" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="4" width="20%"> E-COMMERCE </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_event_e_commerce as $data_event_e_commerce)
                <tr>
                  <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_e_commerce->col_5 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_e_commerce->col_2 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="200px">
                    @php $username = \DB::table('family_members')->where('id_bigo', $data_event_e_commerce->col_2)->first(); @endphp
                    @if($username) {{ $username->name }} @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- SPECIAL TALENT LIVE HOUSE -->
  @if($STLH == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-danger gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_event_special_talent_live_house" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          SPECIAL TALENT <br>
          LIVEHOUSE
        </a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_event_special_talent_live_house" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="4" width="20%"> SPECIAL TALENT LIVEHOUSE (STLH) </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_event_special_talent_live_house as $data_event_special_talent_live_house)
                <tr>
                  <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_special_talent_live_house->col_6 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_special_talent_live_house->col_2 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="200px">
                    @php $username = \DB::table('family_members')->where('id_bigo', $data_event_special_talent_live_house->col_2)->first(); @endphp
                    @if($username) {{ $username->name }} @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- PK EPICAL GLORY -->
  @if(!empty($data_pk_epical_glory))
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-dark gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_pk_epical_glory" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK <br>
          EPICAL GLORY
        </a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_pk_epical_glory" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="5" width="20%"> PK EPICAL GLORY </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_pk_epical_glory as $data_pk_epical_glory)
                <tr>
                  @if(!empty($data_pk_epical_glory['2']) && (str_contains($data_pk_epical_glory['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_epical_glory['13'], 'ᴳᴷ🔥')))
                  <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </td>
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . \Carbon\Carbon::parse($data_pk_epical_glory['1'])->format('H:i') . ' </td>';
                  } catch (\Exception $e) { }
                  @endphp
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_pk_epical_glory['2'] . ' (' . $data_pk_epical_glory['4'] . ') </td>';
                  } catch (\Exception $e) { echo '<td class="align-middle text-nowrap text-center table-white" width="1px"></td>'; }
                  @endphp
                  <td class="align-middle text-nowrap text-center table-white" width="1px"> VS </td>
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_pk_epical_glory['13'] . ' (' . $data_pk_epical_glory['15'] . ') </td>';
                  } catch (\Exception $e) { echo '<td class="align-middle text-nowrap text-center table-white" width="1px"></td>'; }
                  @endphp
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- PK PARTY -->
  @if(!empty($data_pk_party))
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-dark gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_pk_party" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK <br>
          PARTY
        </a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_pk_party" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="5" width="20%"> PK PARTY </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_pk_party as $data_pk_party)
                <tr>
                  @if(!empty($data_pk_party['2']) && (str_contains($data_pk_party['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_party['14'], 'ᴳᴷ🔥')))
                  <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </td>
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . \Carbon\Carbon::parse($data_pk_party['1'])->format('H:i') . ' </td>';
                  } catch (\Exception $e) { }
                  @endphp
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_pk_party['2'] . ' (' . $data_pk_party['4'] . ') </td>';
                  } catch (\Exception $e) { echo '<td class="align-middle text-nowrap text-center table-white" width="1px"></td>'; }
                  @endphp
                  <td class="align-middle text-nowrap text-center table-white" width="1px"> VS </td>
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_pk_party['14'] . ' (' . $data_pk_party['16'] . ') </td>';
                  } catch (\Exception $e) { echo '<td class="align-middle text-nowrap text-center table-white" width="1px"></td>'; }
                  @endphp
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- PK WEEKEND -->
  @if(!empty($data_pk_weekend))
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-dark gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_pk_weekend" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK <br>
          WEEKEND
        </a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_pk_weekend" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="5" width="20%"> PK WEEKEND </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_pk_weekend as $data_pk_weekend)
                <tr>
                  @if(!empty($data_pk_weekend['2']) && (str_contains($data_pk_weekend['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_weekend['14'], 'ᴳᴷ🔥')))
                  <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </td>
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . \Carbon\Carbon::parse($data_pk_weekend['1'])->format('H:i') . ' </td>';
                  } catch (\Exception $e) { }
                  @endphp
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_pk_weekend['2'] . ' (' . $data_pk_weekend['4'] . ') </td>';
                  } catch (\Exception $e) { echo '<td class="align-middle text-nowrap text-center table-white" width="1px"></td>'; }
                  @endphp
                  <td class="align-middle text-nowrap text-center table-white" width="1px"> VS </td>
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_pk_weekend['14'] . ' (' . $data_pk_weekend['16'] . ') </td>';
                  } catch (\Exception $e) { echo '<td class="align-middle text-nowrap text-center table-white" width="1px"></td>'; }
                  @endphp
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- PK FAMILY -->
  @if(!empty($data_pk_family))
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-danger gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_pk_family" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK <br>
          FAMILY
        </a>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal_pk_family" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="5" width="20%"> PK FAMILY </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_pk_family as $data_pk_family)
                <tr>
                  @if(!empty($data_pk_family['2']) && (str_contains($data_pk_family['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_family['10'], 'ᴳᴷ🔥')))
                  <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </td>
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . \Carbon\Carbon::parse($data_pk_family['1'])->format('H:i') . ' </td>';
                  } catch (\Exception $e) { }
                  @endphp
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_pk_family['2'] . ' (' . $data_pk_family['4'] . ') </td>';
                  } catch (\Exception $e) { echo '<td class="align-middle text-nowrap text-center table-white" width="1px"></td>'; }
                  @endphp
                  <td class="align-middle text-nowrap text-center table-white" width="1px"> VS </td>
                  @php
                  try {
                    echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_pk_family['10'] . ' (' . $data_pk_family['12'] . ') </td>';
                  } catch (\Exception $e) { echo '<td class="align-middle text-nowrap text-center table-white" width="1px"></td>'; }
                  @endphp
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
        </div>
      </div>
    </div>
  </div>
  @endif

</div>
@endsection
