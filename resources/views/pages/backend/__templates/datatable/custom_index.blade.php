@extends('layouts.default', ['page' => 'index'])

@push('head')
<link href="/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css" />
@endpush

@push('layout-content')
<div class="card card-custom gutter-b" data-card="true">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label"> {{ __('system.label.main') }} </h3>
    </div>
    <div class="card-toolbar">
      <a id="table-refresh" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="refresh" data-toggle="tooltip" data-original-title="{{ __('system.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
      <div class="dropdown dropdown-inline" bis_skin_checked="1">
        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-download"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" bis_skin_checked="1">
          <ul class="navi navi-hover py-5">
            <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('system.label.export.description.copy') }}"><a href="javascript:void(0);" class="navi-link" id="export_copy"><i class="navi-icon fa fa-copy"></i> {{ __('system.label.export.copy') }} </a></li>
            <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('system.label.export.description.excel') }}"><a href="javascript:void(0);" class="navi-link" id="export_excel"><i class="navi-icon fa fa-file-excel"></i> {{ __('system.label.export.excel') }} </a></li>
            <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('system.label.export.description.pdf') }}"><a href="javascript:void(0);" class="navi-link" id="export_pdf"><i class="navi-icon fa fa-file-pdf"></i> {{ __('system.label.export.pdf') }} </a></li>
            <li class="navi-item" data-toggle="tooltip" data-original-title="{{ __('system.label.export.description.print') }}"><a href="javascript:void(0);" class="navi-link" id="export_print"><i class="navi-icon fa fa-print"></i> {{ __('system.label.export.print') }} </a></li>
          </ul>
        </div>
      </div>
      <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
      <div class="collapse" id="toolbar_delete"><a data-url="" class="delete-all btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="tooltip" title="{{ __('system.label.delete.selected') }}"><i class="text-danger fas fa-trash"></i></a></div>
    </div>
  </div>
  <div class="card-body">

    @stack('alert')

    <div class="table-responsive">
      <table width="100%" class="table table-hover table-bordered table-sm" id="exilednoname">
        <thead>
          <tr>
            <th> No. </th>
            @if (!empty($status) && $status == 'true')
            <th> {{ __('system.label.status') }} </th>
            @endif
            @if (!empty($datetime) && $datetime == 'true')
            <th> {{ __('system.label.date-start') }} </th>
            <th> {{ __('system.label.date-end') }} </th>
            @endif
            @stack('table-head')

            @if (!empty($withoutActive) && $withoutActive == 'false')
            <th class="no-export"> {{ __('system.label.active') }} </th>
            @endif
            @if (!empty($withouAction) && $withouAction == 'false')
            <th class="no-export"> </th>
            @endif
          </tr>
        </thead>
      </table>
    </div>

  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script src="/assets/backend/plugins/custom/datatables/datatables.bundle.js?v=7.0.6"></script>
<script>
$(document).ready(function() {
  $('#toast-container').fadeOut(5000);
});

"use strict";
var table = $('#exilednoname').DataTable({
  processing: true,
  "language": {
    processing: '<span class="font-weight-bolder text-center"> {{ __("system.label.please-wait") }} ... </span>'
  },
  serverSide: true,
  searching: true,
  rowId: 'Collocation',
  select: {
    style: 'multi',
    selector: 'td:first-child .checkable',
  },
  ajax: {
    url: "{{ URL::current() }}",
    "data" : function (d) {
      @if (!empty($withoutActive) && $withoutActive == 'false')
      d.filter_active = $('#filter_active').val();
      @endif
      @stack('filter-data')
      @if ( !empty($status) && $status == 'true')
      d.filter_status = $('.filter-status').val();
      @endif
      @if (!empty($daterange) && $daterange == 'true')
      d.date_start = $('#date_start').val();
      d.date_end = $('#date_end').val();
      @endif
    }
  },
  "lengthMenu": [[25, 100, 250, 999, -1], [25, 100, 250, 999, "All"]],
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
      data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function(data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },
    @if (!empty($status) && $status == 'true')
    {
      data: 'status', orderable: true, 'className': 'align-middle text-center', 'width': '1',
      render: function ( data, type, row ) {
        if ( data == 0 ) { return '<a href="javascript:void(0);" id="status_success" data-toggle="tooltip" data-original-title="Pending" data-id="' + row.id + '"><span class="label label-outline-warning label-pill label-inline"> {{ trans("system.label.pending") }} </span></a>'; }
        if ( data == 1 ) { return '<a href="javascript:void(0);" id="status_pending" data-toggle="tooltip" data-original-title="Success" data-id="' + row.id + '"><span class="label label-outline-success label-pill label-inline"> {{ trans("system.label.success") }} </span></a>'; }
        if ( data == 2 ) { return '<a href="javascript:void(0);" id="status_success" data-toggle="tooltip" data-original-title="Pending" data-id="' + row.id + '"><span class="label label-outline-warning label-pill label-inline"> {{ trans("system.label.pending") }} </span></a>'; }
      }
    },
    @endif
    @if (!empty($datetime) && $datetime == 'true')
    {
      data: 'date_start', orderable: true, 'className': 'align-middle text-nowrap', 'width': '1',
      render: function ( data, type, row ) {
        return data;
      }
    },
    {
      data: 'date_end', orderable: true, 'className': 'align-middle text-nowrap', 'width': '1',
      render: function ( data, type, row ) {
        return data;
      }
    },
    @endif

    @stack('table-body')

    @if (!empty($withoutActive) && $withoutActive == 'false')
    {
      data: 'active', orderable: true, 'className': 'align-middle text-center', 'width': '1',
      render: function ( data, type, row ) {
        if ( data == 0 ) { return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-original-title="Enable" data-id="' + row.id + '"><span class="label label-dark label-inline"> {{ __("system.label.no") }} </span></a>'; }
        if ( data == 1 ) { return '<a href="javascript:void(0);" id="inactive" data-toggle="tooltip" data-original-title="Disable" data-id="' + row.id + '"><span class="label label-info label-inline"> {{ __("system.label.yes") }} </span></a>'; }
        if ( data == 2 ) { return '<a href="javascript:void(0);" id="active" data-toggle="tooltip" data-original-title="Enable" data-id="' + row.id + '"><span class="label label-dark label-inline"> {{ __("system.label.no") }} </span></a>'; }
      }
    },
    @endif
    @if (!empty($withouAction) && $withouAction == 'false')
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
        '<li class="navi-item"><a href="{{ URL::current() }}/' + row.id + '" class="navi-link"><span class="navi-icon"><i class="flaticon2-expand"></i></span><span class="navi-text">{{ __("system.label.view") }}</span></a></li>' +
        '<li class="navi-item"><a href="{{ URL::current() }}/' + row.id + '/edit" class="navi-link"><span class="navi-icon"><i class="flaticon2-contract"></i></span><span class="navi-text">{{ __("system.label.edit") }}</span></a></li>' +
        '<li class="navi-item"><a href="javascript:void(0);" class="navi-link delete" data-id="' + row.id + '"><span class="navi-icon"><i class="flaticon2-trash"></i></span><span class="navi-text"> {{ __("system.label.delete./") }} </span></a></li>' +
        '</ul>' +
        '</div>' +
        '</div>';
      },
    },
    @endif
  ],
  order: [
    [3, 'asc']
  ]
});

// FILTER DATA
$('.filter_active').change(function () { table.column(-2).search( $(this).val() ).draw(); });
$('.filter_status').change(function () { table.column(2).search( $(this).val() ).draw(); });
@stack('filter-function')

@if (!empty($datetime) && $datetime == 'true')
$('#date_start').change(function () { table.draw(); });
$('#date_end').change(function () { table.draw(); });
@endif

$('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
$('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
$('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
$('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });

table.on('change', '.group-checkable', function() {
  var set = $(this).closest('table').find('td:first-child .checkable');
  var checked = $(this).is(':checked');
  $(set).each(function() {
    if (checked) {
      $(this).prop('checked', true);
      table.rows($(this).closest('tr')).select();
      var checkedNodes = table.rows('.selected').nodes();
      var count = checkedNodes.length;
      $('#kt_datatable_selected_records').html(count);
      if (count > 0) {
        $('#toolbar_delete').collapse('show');
      }
    } else {
      $(this).prop('checked', false);
      table.rows($(this).closest('tr')).deselect();
      $('#toolbar_delete').collapse('hide');
    }
  });
});

table.on('change', '.checkable', function() {
  var checkedNodes = table.rows('.selected').nodes();
  var count = checkedNodes.length;
  $('#kt_datatable_selected_records').html(count);
  if (count > 0) {
    $('#toolbar_delete').collapse('show');
  } else {
    $('#toolbar_delete').collapse('hide');
  }
});

$("#table-refresh").on("click", function() {
  $('#toolbar_delete').collapse('hide');
  $('.filter-form').val('');
  table.search( '' ).columns().search( '' ).draw();
  table.ajax.reload();
});

$('body').on('click', '#active', function () {
  var id = $(this).data("id");
  $.ajax({
    type: "get", url: "{{ URL::current() }}/active/"+id, processing: true, serverSide: true,
    success: function (data) {
      var oTable = $('#exilednoname').dataTable();
      $('#toolbar_delete').collapse('hide');
      oTable.fnDraw(false);
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.success("{{ __('system.notification.success.item-active') }}");
    },
    error: function (data) {
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.error("{{ __('system.notification.error./') }}");
    }
  });
});

$('body').on('click', '#inactive', function () {
  var id = $(this).data("id");
  $.ajax({
    type: "get", url: "{{ URL::current() }}/inactive/"+id, processing: true, serverSide: true,
    success: function (data) {
      var oTable = $('#exilednoname').dataTable();
      $('#toolbar_delete').collapse('hide');
      oTable.fnDraw(false);
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.success("{{ __('system.notification.success.item-inactive') }}");
    },
    error: function (data) {
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.error("{{ __('system.notification.error./') }}");
    }
  });
});

$('body').on('click', '#status_success', function () {
  var id = $(this).data("id");
  $.ajax({
    type: "get", url: "{{ URL::current() }}/status-success/"+id, processing: true, serverSide: true,
    success: function (data) {
      var oTable = $('#exilednoname').dataTable();
      $('#toolbar_delete').collapse('hide');
      oTable.fnDraw(false);
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.success("{{ __('system.notification.success.status-success') }}");
    },
    error: function (data) {
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.error("{{ __('system.notification.error./') }}");
    }
  });
});

$('body').on('click', '#status_pending', function () {
  var id = $(this).data("id");
  $.ajax({
    type: "get", url: "{{ URL::current() }}/status-pending/"+id, processing: true, serverSide: true,
    success: function (data) {
      var oTable = $('#exilednoname').dataTable();
      $('#toolbar_delete').collapse('hide');
      oTable.fnDraw(false);
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.success("{{ __('system.notification.success.status-pending') }}");
    },
    error: function (data) {
      toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
      toastr.error("{{ __('system.notification.error./') }}");
    }
  });
});

$('.delete-all').on('click', function(e) {
  var exilednonameArr = [];
  $(".checkable:checked").each(function() { exilednonameArr.push($(this).attr('data-id')); });
  var strEXILEDNONAME = exilednonameArr.join(",");
  Swal.fire({ title: "{{ __('system.notification.are-you-sure') }}?", text: "{{ __('system.notification.delete-selected-confirm') }}", icon: "warning", showCancelButton: true, confirmButtonText: "Yes", cancelButtonText: "No", reverseButtons: false}).then(function(result) {
    if (result.value) {
      $.ajax({
        url: "{{ URL::current() }}/deleteall", type: 'get', headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, data: 'EXILEDNONAME='+strEXILEDNONAME,
        success: function (data) {
          var oTable = $('#exilednoname').dataTable();
          $('#toolbar_delete').collapse('hide');
          oTable.fnDraw(false);
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.success("{{ __('system.notification.success.delete-selected') }}");
        },
        error: function (data) {
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.error("{{ __('system.notification.error./') }}");
        }
      });
    }
  });
});

$('body').on('click', '.delete', function () {
  var id = $(this).data("id");
  Swal.fire({ title: "{{ __('system.notification.are-you-sure') }}?", text: "{{ __('system.notification.confirm-delete') }}", icon: "warning", showCancelButton: true, confirmButtonText: "Yes", cancelButtonText: "No", reverseButtons: false }).then(function(result) {
    if (result.value) {
      $.ajax({
        type: "get", url: "{{ URL::current() }}/delete/"+id,
        success: function (data) {
          var oTable = $('#exilednoname').dataTable();
          oTable.fnDraw(false);
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.success("{{ __('system.notification.success.item-deleted') }}");
        },
        error: function (data) {
          toastr.options = { "positionClass": "toast-bottom-right", "closeButton": true, };
          toastr.error("{{ __('system.notification.error./') }}");
        }
      });
    }
  });
});

$('body').on('click', '#delete', function () {
  var id = $(this).data("id");
  if(confirm("Are You sure want to delete !")){}
});
</script>
@endpush
