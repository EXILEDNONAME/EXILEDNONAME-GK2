@extends('layouts.default')
@section('title', 'Schedules E-Commerce')

@push('head')
<style>
table.fixed { table-layout: fixed; }
</style>
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <a href="{{ url_previous() }}" class="btn btn-sm btn-outline-dark font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('default.label.back') }}
          </a>
        </div>
        <div class="card-toolbar">
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>
      <div class="card-body" style="">
        <div class="table-responsive">
          <table class="table table-bordered fixed" width="100%">
            <thead class="thead-dark">
              <tr>
                <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO E-COMMERCE </th>
                <th class="align-middle text-nowrap text-right" width="200px">
                  <a href="{{ URL::Current() }}/../get-event-e-commerce">
                    <i class="fa fa-check-square text-white"></i>
                  </a>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($data_event_e_commerce as $data_event_e_commerce)
              @if($data_event_e_commerce['3'] == $date_event_e_commerce && $data_event_e_commerce['2'] == 'NEWGASSKEEN🔥')
              <tr>
                <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::parse($data_event_e_commerce['3'])->translatedFormat('j F') }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ \Carbon\Carbon::parse($data_event_e_commerce['4'])->translatedFormat('H:i') }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="200px"> {{ $data_event_e_commerce['1'] }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="200px">
                  @php $username = \DB::table('family_members')->where('id_bigo', $data_event_e_commerce['1'])->first(); @endphp
                  @if($username)
                  {{ $username->name }}
                  @endif
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
