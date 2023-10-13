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
          <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO CONTENT CHALLENGE </th>
          <th class="align-middle text-nowrap text-right" width="200px">
            <a href="/schedules/get-event-content-challenges">
              <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt text-white icon-md ml-1"></i></button>
            </a>
          </th>
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
          <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ $data_event_content_challenge['4'] }} </td>
          @php
          try {
            \Carbon\Carbon::parse($data_event_content_challenge['5']);
            echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . \Carbon\Carbon::parse($data_event_content_challenge['5'])->format('H:i') . ' </td>';
          } catch (\Exception $e) {
            echo '<td class="align-middle text-nowrap text-center table-white" width="50px">' . $data_event_content_challenge['5'] . '</td>';
          }
          @endphp
          <td class="align-middle text-nowrap text-center table-white" width="200px"> {{ $data_event_content_challenge['1'] }} </td>
          <td class="align-middle text-nowrap text-center table-white" width="200px">
            @php $username = \DB::table('main_family_members')->where('id_bigo', $data_event_content_challenge['1'])->first(); @endphp
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

  <div class="table-responsive">
    <table class="table table-bordered fixed" width="100%">
      <thead class="thead-dark">
        <tr>
          <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO ICF </th>
          <th class="align-middle text-nowrap text-right" width="200px">
            <a href="/schedules/get-event-content-festivals">
              <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt text-white icon-md ml-1"></i></button>
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
            @php $username = \DB::table('main_family_members')->where('id_bigo', $data_event_content_festival['0'])->first(); @endphp
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

  <div class="table-responsive">
    <table class="table table-bordered fixed" width="100%">
      <thead class="thead-dark">
        <tr>
          <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO COSPLAY CHARACTER </th>
          <th class="align-middle text-nowrap text-right" width="200px">
            <a href="/schedules/get-event-cosplay-characters">
              <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt text-white icon-md ml-1"></i></button>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_event_cosplay_character as $data_event_cosplay_character)
          @if(
          $data_event_cosplay_character['2'] == $date_event_cosplay_character . ' 00:00:00' AND (
          str_contains($data_event_cosplay_character['3'], '2741') OR
          $data_event_cosplay_character['0'] == 'gressn' OR
          $data_event_cosplay_character['0'] == '829993360' OR
          preg_match("/{$data_event_cosplay_character['0']}/i", 'id_unay')
          )
          )
          <tr>
            <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::parse($data_event_cosplay_character['2'])->translatedFormat('j F') }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ \Carbon\Carbon::parse($data_event_cosplay_character['4'])->format('H:i') }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="200px"> {{ $data_event_cosplay_character['0'] }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="200px">
              @php $username = \DB::table('main_family_members')->where('id_bigo', $data_event_cosplay_character['0'])->first(); @endphp
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

    <div class="table-responsive">
      <table class="table table-bordered fixed" width="100%">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO E-COMMERCE </th>
            <th class="align-middle text-nowrap text-right" width="200px">
              <a href="javascript:;"><i class="fa fa-check-square text-white"></i></a>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_event_e_commerce as $data_event_e_commerce)
          @if($data_event_e_commerce['3'] == $date_event_e_commerce . ' 00:00:00')
          <tr>
            <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::parse($data_event_e_commerce['3'])->translatedFormat('j F') }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ \Carbon\Carbon::parse($data_event_e_commerce['4'])->format('H:i') }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="200px"> {{ $data_event_e_commerce['1'] }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="200px">
              @php $username = \DB::table('main_family_members')->where('id_bigo', $data_event_e_commerce['1'])->first(); @endphp
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

    <div class="table-responsive">
      <table class="table table-bordered fixed" width="100%">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO STLH </th>
            <th class="align-middle text-nowrap text-right" width="200px">
              <a href="/schedules/get-event-special-talent-live-house">
                <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt text-white icon-md ml-1"></i></button>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_event_special_talent_live_house as $data_event_special_talent_live_house)
          <tr>
            @if(!empty($data_event_special_talent_live_house['4']))
            @if(
            $data_event_special_talent_live_house['3'] == $date_event_special_talent_live_house . ' 00:00:00' AND (
            str_contains($data_event_special_talent_live_house['4'], '2741') OR
            $data_event_special_talent_live_house['1'] == 'gressn' OR
            $data_event_special_talent_live_house['1'] == '829993360' OR
            preg_match("/{$data_event_special_talent_live_house['1']}/i", 'id_unay')
            )
            )

            <td class="align-middle text-nowrap text-center table-white" width="100px"> {{ \Carbon\Carbon::parse($data_event_special_talent_live_house['3'])->translatedFormat('j F') }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="50px"> {{ \Carbon\Carbon::parse($data_event_special_talent_live_house['5'])->format('H:i') }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="200px"> {{ $data_event_special_talent_live_house['1'] }} </td>
            <td class="align-middle text-nowrap text-center table-white" width="200px">
              @php $username = \DB::table('main_family_members')->where('id_bigo', $data_event_special_talent_live_house['1'])->first(); @endphp
              @if($username)
              {{ $username->name }}
              @endif
            </td>

            @endif
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>


  @endpush
