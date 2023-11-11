@extends('pages.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true', 'status' => 'true'])
@section('title', 'Events')

@section('table-header')
<th> Event </th>
<th> Content </th>
<th> Date </th>
<th> Name </th>
<th> ID Bigo </th>
@endsection

@section('table-body')
{ data: 'event', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'content', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'date', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'name' },
{ data: 'id_bigo' },
@endsection

@push('filter-head')
<div class="mb-2">
  <div class="col-lg-12 my-2 my-md-0">
    <div class="d-flex align-items-center">
      <div class="input-daterange input-group" id="ex_datepicker_datetime">
        <input type="text" id="date_start" class="form-control filter-form text-center" name="date_start" placeholder="- {{ __('default.select.date') }} -" autocomplete="off" readonly>
        <div class="input-group-append">
          <span class="input-group-text">
            <i class="la la-ellipsis-h"></i>
          </span>
        </div>
        <input type="text" id="date_end" class="form-control filter-form text-center" name="date_end" placeholder="- {{ __('default.select.date') }} -" autocomplete="off" readonly>
      </div>
    </div>
  </div>
</div>
@endpush

@push('filter-data')
ex.date_start = $('#date_start').val();
ex.date_end = $('#date_end').val();
@endpush

@push('filter-function')
$('#date_start').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block(card.getSelf(), {
    overlayColor: '#ffffff',
    type: 'loader',
    state: 'primary',
    message: '{{ __('default.label.processing') }} ...',
    opacity: 0.3,
    size: 'lg'
  });
  setTimeout(function() {
    KTApp.unblock(card.getSelf());
    table.draw();
  }, 2000);
});

$('#date_end').change(function () {
  var card = new KTCard('exilednoname_card');
  KTApp.block(card.getSelf(), {
    overlayColor: '#ffffff',
    type: 'loader',
    state: 'primary',
    message: '{{ __('default.label.processing') }} ...',
    opacity: 0.3,
    size: 'lg'
  });
  setTimeout(function() {
    KTApp.unblock(card.getSelf());
    table.draw();
  }, 2000);
});
@endpush
