<html>
<head>
  <meta charset="utf-8"/>
  <title> EXILEDNONAME </title>
  <meta name="description" content="Schedules"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <br>

  <div class="container-fluid">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle text-nowrap" colspan="3"> BIGO CONTENT CHALLENGE </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_event_content_challenge as $data_event_content_challenge)
          @if(
          $data_event_content_challenge['4'] == $date_event_content_challenge AND (
          str_contains($data_event_content_challenge['3'], '2741') OR
          $data_event_content_challenge['1'] == 'gressn' OR
          $data_event_content_challenge['1'] == '829993360' OR
          preg_match("/{$data_event_content_challenge['1']}/i", 'id_unay')
          )
          )
          <tr>
            <td class="align-middle text-nowrap text-center" width="300px"> {{ $data_event_content_challenge['4'] }} </td>

            @php
            try {
              \Carbon\Carbon::parse($data_event_content_challenge['5']);
              echo '<td class="align-middle text-nowrap text-center">' . \Carbon\Carbon::parse($data_event_content_challenge['5'])->format('H:i') . ' </td>';
            } catch (\Exception $e) {
              echo '<td class="align-middle text-nowrap text-center">' . $data_event_content_challenge['5'] . '</td>';
            }
            @endphp

            <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_event_content_challenge['1'] }} </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="container-fluid">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle text-nowrap" colspan="3"> BIGO ICF </th>
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
            <td class="align-middle text-nowrap text-center" width="300px"> {{ \Carbon\Carbon::parse($data_event_content_festival['2'])->translatedFormat('j F') }} </td>
            <td class="align-middle text-nowrap text-center"> {{ \Carbon\Carbon::parse($data_event_content_festival['4'])->format('H:i') }} </td>
            <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_event_content_festival['0'] }} </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="container-fluid">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle text-nowrap" colspan="3"> BIGO E-COMMERCE </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_event_e_commerce as $data_event_e_commerce)
          @if($data_event_e_commerce['3'] == $date_event_e_commerce . ' 00:00:00')
          <tr>
            <td class="align-middle text-nowrap text-center" width="300px"> {{ \Carbon\Carbon::parse($data_event_e_commerce['3'])->translatedFormat('j F') }} </td>
            <td class="align-middle text-nowrap text-center"> {{ \Carbon\Carbon::parse($data_event_e_commerce['4'])->format('H:i') }} </td>
            <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_event_e_commerce['1'] }} </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="container-fluid">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle text-nowrap" colspan="3"> BIGO COSPLAY CHARACTER </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_event_cosplay_character as $data_event_cosplay_character)
          @if(
          $data_event_cosplay_character['2'] == $date_event_cosplay_character . ' 00:00:00' AND (
          $data_event_cosplay_character['3'] == '2741' OR
          $data_event_cosplay_character['0'] == 'gressn' OR
          $data_event_cosplay_character['0'] == '829993360' OR
          preg_match("/{$data_event_cosplay_character['0']}/i", 'id_unay')
          )
          )
          <tr>
            <td class="align-middle text-nowrap text-center" width="300px"> {{ \Carbon\Carbon::parse($data_event_cosplay_character['2'])->translatedFormat('j F') }} </td>
            <td class="align-middle text-nowrap text-center"> {{ \Carbon\Carbon::parse($data_event_cosplay_character['4'])->format('H:i') }} </td>
            <td class="align-middle text-nowrap text-center" width="200px"> {{ $data_event_cosplay_character['0'] }} </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

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


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
