<div class="table-responsive">
  <table class="table table-bordered fixed" width="100%">
    <thead class="thead-dark">
      <tr>
        <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO ICF </th>
        <th class="align-middle text-nowrap text-right" width="200px">
          <a href="{{ URL::Current() }}/get-event-indonesia-content-festival">
            <i class="fa fa-check-square text-white"></i>
          </a>
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach($data_event_content_festival as $data_event_content_festival)
      @if(
      $data_event_content_festival['2'] == $date_event_content_festival . ' 00:00:00' AND (
      str_contains($data_event_content_festival['3'], '2741') OR
      $data_event_content_festival['0'] == 'gressn' OR
      $data_event_content_festival['0'] == '829993360' OR
      preg_match("/{$data_event_content_festival['0']}/i", 'id_unay')
      )
      )
      <tr>
        <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::parse($data_event_content_festival['2'])->translatedFormat('j F') }} </td>
        <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ \Carbon\Carbon::parse($data_event_content_festival['4'])->format('H:i') }} </td>
        <td class="align-middle text-nowrap text-center table-white" width="200px"> {{ $data_event_content_festival['0'] }} </td>
        <td class="align-middle text-nowrap text-center table-white" width="200px">
          @php $username = \DB::table('family_members')->where('id_bigo', $data_event_content_festival['0'])->first(); @endphp
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
