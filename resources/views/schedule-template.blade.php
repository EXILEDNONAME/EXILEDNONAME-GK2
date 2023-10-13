@extends('layouts.default_noauth')

@push('layout-content')



        <div class="card-body" style="">
          <div class="table-responsive">
            <table class="table table-bordered table-dark" width="100%">
              <thead class="thead-dark">

              </thead>
              <tbody>
                <tr>
                  <td class="align-middle text-nowrap table-dark text-center" colspan="3"><span class=""><b><u> BIGO CONTENT CHALLENGE </u></b></span></td>
                  <td class="align-middle text-nowrap table-dark text-center"><a href="{{ URL::Current() }}/get-event-content-challenges">
                    <!-- <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt text-white"></i></button> -->
                  <!-- <span class="label label-sm label-info mr-2"></span> -->
                  <!-- <span class="label label-light label-inline font-weight-lighter"><i class="fas fa-download icon-sm text-white"></i></span> -->
                  <!-- -->
                  <button type="button" class="btn btn-primary btn-block btn-sm"><i class="fas fa-sync icon-nm text-white ml-2"></i></button>
                </a>

                  </td>
                </tr>
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
                  <td class="align-middle text-nowrap text-center" width="100px"> {{ $data_event_content_challenge['4'] }} </td>
                  @php
                  try {
                    \Carbon\Carbon::parse($data_event_content_challenge['5']);
                    echo '<td class="align-middle text-nowrap text-center" width="100px">' . \Carbon\Carbon::parse($data_event_content_challenge['5'])->format('H:i') . ' </td>';
                  } catch (\Exception $e) {
                    echo '<td class="align-middle text-nowrap text-center" width="100px">' . $data_event_content_challenge['5'] . '</td>';
                  }
                  @endphp
                  <td class="align-middle text-nowrap text-center"> {{ $data_event_content_challenge['1'] }} </td>
                  <td class="align-middle text-nowrap text-center" width="1">
                    @php $username = \DB::table('main_family_members')->where('id_bigo', $data_event_content_challenge['1'])->first(); @endphp
                    Safiranilam
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


@endpush
