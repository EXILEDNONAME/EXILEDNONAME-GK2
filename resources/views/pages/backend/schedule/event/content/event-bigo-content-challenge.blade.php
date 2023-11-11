<div class="table-responsive">
  <table class="table table-bordered fixed" width="100%">
    <thead class="thead-dark">
      <tr>
        <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO CONTENT CHALLENGE </th>
        <th class="align-middle text-nowrap text-right" width="200px">
          <a href="/schedules/get-event-content-challenges">
            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt text-white icon-md ml-1"></i></button>
          </a>
        </th>
      </tr>
    </thead>
    <tbody>
      <!--
      [1] ID
      [2] Agency
      [3] Date
      [4] Time
    -->
    @foreach($data_event_content_challenge as $data_event_content_challenge)
    @if(!empty($data_event_content_challenge['4']))

    @if(
    $data_event_content_challenge['3'] == $date_event_content_challenge AND (
    str_contains($data_event_content_challenge['2'], '2741') OR
    $data_event_content_challenge['1'] == 'gressn' OR
    $data_event_content_challenge['1'] == '829993360' OR
    preg_match("/{$data_event_content_challenge['1']}/i", 'id_unay')
    )
    )
    <tr>
      <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ $data_event_content_challenge['3'] }} </td>
      <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ $data_event_content_challenge['4'] }} </td>
      <td class="align-middle text-nowrap text-center table-white" width="200px"> {{ $data_event_content_challenge['1'] }} </td>
      <td class="align-middle text-nowrap text-center table-white" width="200px"> _blank </td>
    </tr>
    @endif

    @endif
    @endforeach
  </tbody>

</table>
</div>

<hr>
