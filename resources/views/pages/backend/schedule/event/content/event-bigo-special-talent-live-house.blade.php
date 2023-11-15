@extends('layouts.default')
@section('title', 'Schedules Special Talent Livehouse')

@push('head')
<style>
table.fixed { table-layout: fixed; }
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
          <table class="table table-bordered fixed" width="100%">
            <thead class="thead-dark">
              <tr>
                <th class="align-middle text-nowrap" colspan="3" width="350px"> BIGO STLH </th>
                <th class="align-middle text-nowrap text-right" width="200px">
                  <a href="{{ URL::Current() }}/../get-event-special-talent-livehouse">
                    <i class="fa fa-check-square text-white"></i>
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
                  @php $username = \DB::table('family_members')->where('id_bigo', $data_event_special_talent_live_house['1'])->first(); @endphp
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
    </div>
  </div>
</div>
@endsection
