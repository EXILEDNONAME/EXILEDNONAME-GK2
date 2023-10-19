@extends('layouts.default_noauth')
@push('head')
<style>
table.fixed {
  table-layout: fixed;
}
</style>
@endpush

@push('layout-content')
<div class="card-body" style="">

  <div class="table-responsive">
    <table class="table table-bordered fixed" width="100%">
      <thead class="thead-dark">
        <tr>
          <th class="align-middle text-nowrap" colspan="4" width="1110px"> BIGO PK PARTY (MANUAL SHEETS .ENV) </th>
          <th class="align-middle text-nowrap text-right" width="750px">
            <a href="/schedules/get-pk-party">
              <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt text-white icon-md ml-1"></i></button>
            </a>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($data_pk_party as $data_pk_party)
        <tr>
          @if(str_contains($data_pk_party['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_party['14'], 'ᴳᴷ🔥'))
          <td class="align-middle text-nowrap text-center table-white" width="300px"> PK PARTY {{ env('SHEET_PK_PARTY')}} </td>
          <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ \Carbon\Carbon::parse($data_pk_party['1'])->format('H:i') }} </td>
          <td class="align-middle text-nowrap text-center table-white" width="750px"> {{ $data_pk_party['2'] . ' (' . $data_pk_party['4'] . ')' }} </td>
          <td class="align-middle text-nowrap text-center table-white" width="10px"> {{ $data_pk_party['13'] }} </td>
          <td class="align-middle text-nowrap text-center table-white" width="750px"> {{ $data_pk_party['14'] . ' (' . $data_pk_party['16'] . ')' }} </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endpush
