@extends('layouts.default')

@push('head')
<link rel="stylesheet" type="text/css" href="/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" />
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b" data-card="true" id="exilednoname_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('default.label.main') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/create" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.create') }}"><i class="fas fa-plus"></i></a>
          <a id="table-refresh" class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <div data-toggle="collapse" data-target="#collapse-filter" aria-expanded="true"><a class="btn btn-icon btn-xs btn-hover-light-primary" data-toggle="tooltip" data-original-title="{{ __('default.label.filter./') }}"><i class="fas fa-filter"></i></a></div>
          <div class="dropdown dropdown-inline" bis_skin_checked="1">
            <button type="button" class="btn btn-clean btn-xs btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" bis_skin_checked="1">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.copy') }}"><a href="javascript:void(0);" class="navi-link" id="export_copy"><i class="navi-icon fa fa-copy"></i> {{ __('default.label.export.copy') }} </a></li>
                <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.excel') }}"><a href="javascript:void(0);" class="navi-link" id="export_excel"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }} </a></li>
                <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.pdf') }}"><a href="javascript:void(0);" class="navi-link" id="export_pdf"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }} </a></li>
                <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('default.label.export.description.print') }}"><a href="javascript:void(0);" class="navi-link" id="export_print"><i class="navi-icon fa fa-print"></i> {{ __('default.label.export.print') }} </a></li>
              </ul>
            </div>
          </div>
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
          <div id="collapse_bulk" class="collapse">
            <div class="dropdown">
              <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                <a class="btn btn-icon btn-xs btn-hover-light-primary mr-1" data-toggle="tooltip" data-original-title="{{ __('default.label.action') }}"><i class="fas fa-ellipsis-h"></i></a>
              </div>
              <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                <ul class="navi navi-hover py-4">
                  @if (empty($active) || $active == 'true')
                  <li class="navi-item"> <a href="javascript:void(0);" class="navi-link selected-active"> {{ __('default.label.selected-active') }} </a></li>
                  <li class="navi-item"> <a href="javascript:void(0);" class="navi-link selected-inactive"> {{ __('default.label.selected-inactive') }} </a></li>
                  @endif
                  <li class="navi-item"> <a href="javascript:void(0);" class="navi-link selected-delete"> {{ __('default.label.selected-delete') }} </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body" id="exilednoname_body">

        @if ($message = Session::get('success'))
        <div id="toast-container" class="toast-bottom-right">
          <div class="toast toast-success" aria-live="polite">
            <div class="toast-message">{{ $message }}</div>
          </div>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div id="toast-container" class="toast-bottom-right">
          <div class="toast toast-error" aria-live="polite">
            <div class="toast-message">{{ $message }}</div>
          </div>
        </div>
        @endif

        <div class="accordion" id="accordion-filter">
          <div id="collapse-filter" class="collapse hide" data-parent="#accordion-filter">

            @if (empty($active))
            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <select data-column="-2" class="form-control filter-form filter_active">
                    <option value=""> - {{ __('default.select.active') }} - </option>
                    <option value="1"> {{ __('default.label.yes') }} </option>
                    <option value="2"> {{ __('default.label.no') }} </option>
                  </select>
                </div>
              </div>
            </div>
            @endif

            @stack('filter-head')

            @if (!empty($status) && $status == 'true')
            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <select data-column="2" class="form-control filter-form filter_status">
                    <option value=""> - {{ __('default.select.status') }} - </option>
                    <option value="1"> {{ __('default.label.success') }} </option>
                    <option value="2"> {{ __('default.label.pending') }} </option>
                  </select>
                </div>
              </div>
            </div>
            @endif

            @if (!empty($datetime) && $datetime == 'true')
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
            @endif

            <hr>
          </div>
        </div>

        <div class="table-responsive">
          <table width="100%" class="table table-hover table-checkable table-sm rounded" id="exilednoname_table">
            <thead>
              <tr>
                <th class="no-export"> </th>
                <th> No. </th>
                @if (!empty($status) && $status == 'true')
                <th> {{ __('default.label.status') }} </th>
                @endif
                @if (!empty($datetime) && $datetime == 'true')
                <th> {{ __('default.label.date-start') }} </th>
                <th> {{ __('default.label.date-end') }} </th>
                @endif

                @yield('table-header')

                @if (empty($active))
                <th class="no-export"> {{ __('default.label.active') }} </th>
                @endif
                <th class="no-export"> </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include('pages.backend.__includes.extension')
@endsection

@push('js')
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script src="/assets/backend/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/features/cards/tools.js?v=7.0.6"></script>

<script>
$(document).ready(function() {
  $('#toast-container').fadeOut(5000);
  KTApp.block('#exilednoname_body', {
    overlayColor: '#000000',
    state: 'primary',
    message: "{{ __('default.label.please-wait') }} ..."
  });

  @if(!empty($chart) && $chart == 'true')
  KTApp.block('#exilednoname_chart', {
    overlayColor: '#000000',
    state: 'primary',
    message: "{{ __('default.label.please-wait') }} ..."
  });
  @endif

  @if(!empty($activity) && $activity == 'true')
  KTApp.block('#exilednoname_activity', {
    overlayColor: '#000000',
    state: 'primary',
    message: "{{ __('default.label.please-wait') }} ..."
  });
  @endif

  setTimeout(function() {
    KTApp.unblock('#exilednoname_body');
    KTApp.unblock('#exilednoname_chart');
    KTApp.unblock('#exilednoname_activity');
  }, 2000);
});

"use strict";

var sort = {!! json_encode($sort) !!};
var table = $('#exilednoname_table').DataTable({
  serverSide: true,
  searching: true,
  rowId: 'Collocation',
  select: {
    style: 'multi',
    selector: 'td:first-child .checkable',
  },
  ajax: {
    url: "{{ URL::current() }}",
    "data" : function (ex) {
      @if (!empty($datetime) && $datetime == 'true')
      ex.date_start = $('#date_start').val();
      ex.date_end = $('#date_end').val();
      @endif
    }
  },
  headerCallback: function(thead, data, start, end, display) {
    thead.getElementsByTagName('th')[0].innerHTML = `
    <label class="checkbox checkbox-single checkbox-solid checkbox-primary mb-0">
    <input type="checkbox" value="" class="group-checkable"/>
    <span></span>
    </label>`;
  },
  "lengthMenu": [[50, 100, 250, 500, -1], [50, 100, 250, 500, "All"]],
  buttons: [
    { extend: 'print', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export" }, },
    { extend: 'copyHtml5', autoClose: 'true', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export" }, },
    { extend: 'excelHtml5', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export" }, },
    { extend: 'pdfHtml5', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export" }, },
    { extend: 'print', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export", rows: { selected: true } }, },
    { extend: 'copyHtml5', autoClose: 'true', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export", rows: { selected: true } }, },
    { extend: 'excelHtml5', exportOptions: {  columns: "thead th:not(.no-export)", orthogonal: "Export", rows: { selected: true } }, },
    { extend: 'pdfHtml5', exportOptions: { columns: "thead th:not(.no-export)", orthogonal: "Export", rows: { selected: true } }, },
  ],
  columns: [
    {
      data: 'checkbox', orderable: false, searchable: false, 'width': '1',
      render: function(data, type, row, meta) { return '<label class="checkbox checkbox-single checkbox-primary mb-0"><input type="checkbox" data-id="' + row.id + '" class="checkable"><span></span></label>'; },
    },
    {
      data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function(data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; }
    },
    @if (!empty($status) && $status == 'true')
    {
      data: 'status', orderable: true, 'className': 'align-middle text-center', 'width': '1',
      render: function ( data, type, row ) {
        if ( data == 0 ) { return '<a href="javascript:void(0);" id="status_success" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-outline-warning label-pill label-inline"> {{ __("default.label.pending") }} </span></a>'; }
        if ( data == 1 ) { return '<a href="javascript:void(0);" id="status_pending" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-outline-success label-pill label-inline"> {{ __("default.label.success") }} </span></a>'; }
        if ( data == 2 ) { return '<a href="javascript:void(0);" id="status_success" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-outline-warning label-pill label-inline"> {{ __("default.label.pending") }} </span></a>'; }
      }
    },
    @endif
    @if (!empty($datetime) && $datetime == 'true')
    {
      data: 'date_start', orderable: true, 'className': 'align-middle text-nowrap', 'width': '1',
      render: function ( data, type, row ) {
        if (data == null) { return '<center> - </center>'}
        else { return data; }
      }
    },
    {
      data: 'date_end', orderable: true, 'className': 'align-middle text-nowrap', 'width': '1',
      render: function ( data, type, row ) {
        if (data == null) { return '<center> - </center>'}
        else { return data; }
      }
    },
    @endif

    @yield('table-body')

    @if (empty($active))
    {
      data: 'active', orderable: true, 'className': 'align-middle text-center', 'width': '1',
      render: function ( data, type, row ) {
        if ( data == 0 ) { return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-dark label-inline"> {{ __("default.label.no") }} </span></a>'; }
        if ( data == 1 ) { return '<a href="javascript:void(0);" id="inactive" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-info label-inline"> {{ __("default.label.yes") }} </span></a>'; }
        if ( data == 2 ) { return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-id="' + row.id + '"><span class="label label-dark label-inline"> {{ __("default.label.no") }} </span></a>'; }
      }
    },
    @endif
    {
      data: 'action',
      orderable: false,
      searchable: false,
      'width': '1',
      render: function(data, type, row) {
        return '' +
        '<div class="dropdown dropdown-inline">' +
        '<button type="button" class="btn btn-hover-light-dark btn-icon btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ki ki-bold-more-ver"></i></button>' +
        '<div class="dropdown-menu dropdown-menu-xs" style="">' +
        '<ul class="navi navi-hover py-5">' +
        '<li class="navi-item"><a href="{{ URL::current() }}/' + row.id + '" class="navi-link"><span class="navi-icon"><i class="flaticon2-expand"></i></span><span class="navi-text">{{ __("default.label.view") }}</span></a></li>' +
        '<li class="navi-item"><a href="{{ URL::current() }}/' + row.id + '/edit" class="navi-link"><span class="navi-icon"><i class="flaticon2-contract"></i></span><span class="navi-text">{{ __("default.label.edit") }}</span></a></li>' +
        '<li class="navi-item"><a href="javascript:void(0);" class="navi-link delete" data-id="' + row.id + '"><span class="navi-icon"><i class="flaticon2-trash"></i></span><span class="navi-text"> {{ __("default.label.delete./") }} </span></a></li>' +
        '</ul>' +
        '</div>' +
        '</div>';
      },
    },
  ],
  order: [
    [sort, 'asc']
  ]
});

@if (empty($active) || $active == 'true')
$('.filter_active').change(function () {
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
  }, 2000);
  table.column(-2).search( $(this).val() ).draw();
});
@endif

@if (!empty($status) && $status == 'true')
$('.filter_status').change(function () {
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
  }, 2000);
  table.column(2).search( $(this).val() ).draw();
});
@endif

@if (!empty($datetime) && $datetime == 'true')
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
@endif

$('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
$('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
$('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
$('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });

@include('pages.backend.__templates.datatable.extension.javascript.checkable')
@include('pages.backend.__templates.datatable.extension.javascript.checkable-group')
@include('pages.backend.__templates.datatable.extension.javascript.activity-refresh')
@include('pages.backend.__templates.datatable.extension.javascript.chart-refresh')
@include('pages.backend.__templates.datatable.extension.javascript.table-refresh')
@include('pages.backend.__templates.datatable.extension.javascript.status_success')
@include('pages.backend.__templates.datatable.extension.javascript.status_pending')
@include('pages.backend.__templates.datatable.extension.javascript.active')
@include('pages.backend.__templates.datatable.extension.javascript.inactive')
@include('pages.backend.__templates.datatable.extension.javascript.delete')
@include('pages.backend.__templates.datatable.extension.javascript.selected-active')
@include('pages.backend.__templates.datatable.extension.javascript.selected-inactive')
@include('pages.backend.__templates.datatable.extension.javascript.selected-delete')
@include('pages.backend.__templates.datatable.extension.javascript.chart')
</script>
@endpush
