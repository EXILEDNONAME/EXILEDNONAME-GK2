@extends('pages.backend.__templates.datatable.show', ['datetime' => 'true', 'status' => 'true'])
@section('title', 'Events')

@push('content')
@if($data->ss_report)
<tr>
  <td class="align-middle font-weight-bold"> SS Report </td>
  <td class="align-middle">
    <a data-toggle="modal" class="btn btn-outline-primary mr-2" data-target="#image"> Show </a>
  </td>
</tr>
@endif
<tr>
  <td class="align-middle font-weight-bold"> Date </td>
  <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date)->format('d F Y, H:i') }} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Event </td>
  <td class="align-middle"> {!! $data->event !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Content </td>
  <td class="align-middle"> {!! $data->content !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Name </td>
  <td class="align-middle"> {!! $data->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> ID Bigo </td>
  <td class="align-middle"> {!! $data->id_bigo !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td class="align-middle"> {!! nl2br(e($data->description)) !!} </td>
</tr>
@endpush

@push('modal')
<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> {{ __('default.label.qr-code') }} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        @if($data->event == "CONTENT CHALLENGE")
        <img class="img-fluid" src="/storage/report-events/CONTENT CHALLENGE/{{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}/{{ $data->ss_report }}">
        @endif
        @if($data->event == "ICF")
        <img class="img-fluid" src="/storage/report-events/ICF/{{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}/{{ $data->ss_report }}">
        @endif
      </div>
      <div class="modal-footer">
        <a href="{{ URL::Current() }}/../downloadfile/{{ $data->id }}"><button type="button" class="btn btn-outline-primary font-weight-bolder"> Download </button></a>
        <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('default.label.close') }} </button>
      </div>
    </div>
  </div>
</div>
@endpush
