<div class="container-fluid">
  <div class="table-responsive">
    <table class="table table-bordered" width="100%">
      <thead class="thead-dark">
        <tr>
          <th class="align-middle text-nowrap" colspan="5"> BIGO PK PARTY (MANUAL SHEETS) </th>
        </tr>
      </thead>
      <tbody>
        @foreach($data_pk_party as $data_pk_party)
        <tr>
          @if(str_contains($data_pk_party['2'], 'ᴳᴷ🔥') OR str_contains($data_pk_party['14'], 'ᴳᴷ🔥'))
          <td class="align-middle text-nowrap text-center" width="200px"> PK PARTY {{ env('DATE_PK_PARTY')}} </td>
          <td class="align-middle text-nowrap text-center" width="200px"> {{ \Carbon\Carbon::parse($data_pk_party['1'])->format('H:i') }} </td>
          <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_pk_party['2'] . ' (' . $data_pk_party['4'] . ')' }} </td>
          <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_pk_party['13'] }} </td>
          <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_pk_party['14'] . ' (' . $data_pk_party['16'] . ')' }} </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
