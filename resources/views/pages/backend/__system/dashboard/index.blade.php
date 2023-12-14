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
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_icf->col_5 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_icf->col_1 }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="200px">
                    @php $username = \DB::table('family_members')->where('id_bigo', $data_event_icf->col_1)->first(); @endphp
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
                    @php $username = \DB::table('family_members')->where('id_bigo', $data_event_e_commerce->col_1)->first(); @endphp
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
                    @php $username = \DB::table('family_members')->where('id_bigo', $data_event_special_talent_live_house->col_1)->first(); @endphp
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

</div>
@endsection
