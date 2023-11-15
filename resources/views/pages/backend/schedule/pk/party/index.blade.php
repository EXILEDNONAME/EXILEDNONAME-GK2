@extends('layouts.default')
@section('title', 'Schedule PK Party')

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
          <table class="table table-bordered" width="100%">
            <thead class="thead-dark">
              <tr>
                <th class="align-middle text-nowrap" colspan="2" width="20%"> BIGO PK PARTY - {{ env('SHEET_PK_PARTY') }} </th>
                <th class="align-middle text-nowrap text-right" colspan="3">
                  <a href="{{ URL::Current() }}/../get-pk-party">
                    <i class="fa fa-check-square text-white"></i>
                  </a>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($data_pk_party as $data_pk_party)
              <tr>
                @if(str_contains($data_pk_party['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_party['14'], 'ᴳᴷ🔥'))
                <td class="align-middle text-nowrap text-center table-white" width="50px"> PK PARTY {{ env('SHEET_PK_PARTY')}} </td>
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

    </div>
  </div>
</div>
@endsection
