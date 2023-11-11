@extends('layouts.default')
@section('title', 'Schedule PK')

@push('head')
<style>
table.fixed {
  table-layout: fixed;
}
</style>
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('main.label.schedules') }} </h3>
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
                <th class="align-middle text-nowrap" colspan="4" width="1110px"> BIGO PK WEEKEND - {{ env('SHEET_PK_WEEKEND_1') }}, {{ env('SHEET_PK_WEEKEND_2') }} </th>
                <th class="align-middle text-nowrap text-right" width="750px">
                  <a href="{{ URL::Current() }}/get-pk-weekend">
                    <i class="fa fa-check-square text-white"></i>
                  </a>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($data_pk_weekend_1 as $data_pk_weekend_1)
              <tr>
                @if(str_contains($data_pk_weekend_1['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_weekend_1['14'], 'ᴳᴷ🔥'))
                <td class="align-middle text-nowrap text-center table-white" width="300px"> PK WEEKEND {{ env('SHEET_PK_WEEKEND_1')}} </td>
                <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ \Carbon\Carbon::parse($data_pk_weekend_1['1'])->format('H:i') }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="750px"> {{ $data_pk_weekend_1['2'] . ' (' . $data_pk_weekend_1['4'] . ')' }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="10px"> {{ $data_pk_weekend_1['13'] }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="750px"> {{ $data_pk_weekend_1['14'] . ' (' . $data_pk_weekend_1['16'] . ')' }} </td>
                @endif
              </tr>
              @endforeach
              @foreach($data_pk_weekend_2 as $data_pk_weekend_2)
              <tr>
                @if(str_contains($data_pk_weekend_2['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_weekend_2['14'], 'ᴳᴷ🔥'))
                <td class="align-middle text-nowrap text-center table-white" width="300px"> PK WEEKEND {{ env('SHEET_PK_WEEKEND_1')}} </td>
                <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ \Carbon\Carbon::parse($data_pk_weekend_2['1'])->format('H:i') }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="750px"> {{ $data_pk_weekend_2['2'] . ' (' . $data_pk_weekend_2['4'] . ')' }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="10px"> {{ $data_pk_weekend_2['13'] }} </td>
                <td class="align-middle text-nowrap text-center table-white" width="750px"> {{ $data_pk_weekend_2['14'] . ' (' . $data_pk_weekend_2['16'] . ')' }} </td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>

    </div>
  </div>
</div>
@endsection
