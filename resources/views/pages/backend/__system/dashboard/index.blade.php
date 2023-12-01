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

  @if($pk_epical_glory->active == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-warning gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_pk_epical_glory" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK EPICAL GLORY <br>
          {{ env('SHEET_PK_EPICAL_GLORY') }}
        </a>
      </div>
    </div>
  </div>

  <!-- MODAL PK EPICAL GLORY -->
  <div class="modal fade" id="modal_pk_epical_glory" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="1" width="1"> PK GLORY - {{ env('SHEET_PK_EPICAL_GLORY') }} </th>
                  <th class="align-middle text-nowrap text-right" colspan="3">
                    <a href="/dashboard/schedules/pk/get-pk-epical-glory">
                      <i class="fa fa-check-square text-white"></i>
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_pk_epical_glory as $data_pk_epical_glory)
                <tr>
                  @if(!empty($data_pk_epical_glory['2']) || !empty($data_pk_epical_glory['13']))
                  @if(str_contains($data_pk_epical_glory['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_epical_glory['13'], 'ᴳᴷ🔥'))
                  <td class="align-middle text-nowrap text-center table-white" width="5px"> {{ \Carbon\Carbon::parse($data_pk_epical_glory['1'])->format('H:i') }} </td>
                  <td class="align-middle text-nowrap text-center table-white"> {{ $data_pk_epical_glory['2'] . ' (' . $data_pk_epical_glory['4'] . ')' }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="5px"> {{ $data_pk_epical_glory['12'] }} </td>
                  <td class="align-middle text-nowrap text-center table-white"> {{ $data_pk_epical_glory['13'] . ' (' . $data_pk_epical_glory['15'] . ')' }} </td>
                  @endif
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

  @if($pk_party->active == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-danger gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_pk_party" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK <br>
          PARTY
        </a>
      </div>
    </div>
  </div>

  <!-- MODAL PK PARTY -->
  <div class="modal fade" id="modal_pk_party" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="1" width="20%"> PK PARTY - {{ \Carbon\Carbon::now()->translatedFormat('j F') }} </th>
                  <th class="align-middle text-nowrap text-right" colspan="3">
                    <a href="/dashboard/schedules/pk/get-pk-party">
                      <i class="fa fa-check-square text-white"></i>
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_pk_party as $data_pk_party)
                <tr>
                  @if(str_contains($data_pk_party['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_party['14'], 'ᴳᴷ🔥'))
                  <td class="align-middle text-nowrap text-center table-white" width="5px"> {{ \Carbon\Carbon::parse($data_pk_party['1'])->format('H:i') }} </td>
                  <td class="align-middle text-nowrap text-center table-white"> {{ $data_pk_party['2'] . ' (' . $data_pk_party['4'] . ')' }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="5px"> {{ $data_pk_party['13'] }} </td>
                  <td class="align-middle text-nowrap text-center table-white"> {{ $data_pk_party['14'] . ' (' . $data_pk_party['16'] . ')' }} </td>
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

  @if($pk_weekend->active == 1)
  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="card card-custom wave wave-animate-slow wave-dark gutter-b">
      <div class="card-body text-center">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_pk_weekend" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK WEEKEND <br>
          {{ env('SHEET_PK_WEEKEND') }}
        </a>
      </div>
    </div>
  </div>

  <!-- MODAL PK WEEKEND -->
  <div class="modal fade" id="modal_pk_weekend" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th class="align-middle text-nowrap" colspan="1" width="20%"> PK WEEKEND - {{ env('SHEET_PK_WEEKEND') }}</th>
                  <th class="align-middle text-nowrap text-right" colspan="3">
                    <a href="/dashboard/schedules/pk/get-pk-weekend">
                      <i class="fa fa-check-square text-white"></i>
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($data_pk_weekend as $data_pk_weekend)
                <tr>
                  @if(str_contains($data_pk_weekend['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_weekend['14'], 'ᴳᴷ🔥'))
                  <td class="align-middle text-nowrap text-center table-white" width="5px"> {{ \Carbon\Carbon::parse($data_pk_weekend['1'])->format('H:i') }} </td>
                  <td class="align-middle text-nowrap text-center table-white"> {{ $data_pk_weekend['2'] . ' (' . $data_pk_weekend['4'] . ')' }} </td>
                  <td class="align-middle text-nowrap text-center table-white" width="5px"> {{ $data_pk_weekend['13'] }} </td>
                  <td class="align-middle text-nowrap text-center table-white"> {{ $data_pk_weekend['14'] . ' (' . $data_pk_weekend['16'] . ')' }} </td>
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

<div class="row">

  @if($event_icf->active == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-info gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/events/indonesia-content-festivals" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          ICF <br>
          INDONESIA CONTENT FESTIVALS
        </a>
      </div>
    </div>
  </div>
  @endif

  @if($event_content_challenge->active == 1)
  <div class="col-xl-3 col-lg-4 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-primary gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/events/content-challenges" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> CONTENT CHALLENGES
        </a>
      </div>
    </div>
  </div>
  @endif

  @if($event_e_commerce->active == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-warning gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/events/e-commerce" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> E-COMMERCE
        </a>
      </div>
    </div>
  </div>
  @endif

  @if($event_stlh->active == 1)
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-success gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/events/special-talent-live-house" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          SPECIAL TALENT <br> LIVE HOUSE
        </a>
      </div>
    </div>
  </div>
  @endif

</div>
@endsection
