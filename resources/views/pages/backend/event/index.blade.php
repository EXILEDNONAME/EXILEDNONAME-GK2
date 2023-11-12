@extends('pages.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true', 'status' => 'true'])
@section('title', 'Events')

@push('alert')
<div class="accordion  accordion-toggle-arrow" id="accordionExample4">

					<div class="card">
						<div class="card-header" id="headingTwo4">
							<div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo4">
								<i class="flaticon2-copy"></i> Notes
							</div>
						</div>
						<div id="collapseTwo4" class="collapse" data-parent="#accordionExample4">
							<div class="card-body">
                - Jika Status Pending : Jadwal Event Belum Cek & Belum Di Kirimkan ke Admin Bigo <br>
                - Jika Status Progress : Jadwal Event Memungkinkan Sudah Terdaftar & Event Akan Berjalan <br>
                - Jika Status Success : Report SS Event Sudah Di Cek Dan Di Kirimkan ke Admin Bigo (Event Selesai) <i class="fas fa-check-circle text-success"></i>
							</div>
						</div>
					</div>

				</div>
        <br>
@endpush

@section('table-header')
<th> File </th>
<th> Date </th>
<th> Event </th>
<th> Content </th>
<th> Name </th>
<th> ID Bigo </th>
@endsection

@section('table-body')
{
  data: 'file_report', orderable: false, 'className': 'align-middle text-center', 'width': '1',
  render: function ( data, type, row ) {
    return data;
  }
},
{ data: 'date', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'event', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'content', 'className': 'align-middle text-nowrap', 'width': '1' },
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
