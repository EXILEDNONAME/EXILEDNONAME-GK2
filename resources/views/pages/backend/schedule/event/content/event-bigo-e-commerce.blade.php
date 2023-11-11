<div class="table-responsive">
  <table class="table table-bordered fixed" width="100%">
    <thead class="thead-dark">
      <tr>
        <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO E-COMMERCE </th>
        <th class="align-middle text-nowrap text-right" width="200px">
          <a href="{{ URL::Current() }}/get-event-e-commerce">
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
        <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_e_commerce['4'] }} </td>
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

<hr>
