@extends('layouts.default')

@push('layout-content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h4 class="card-label"> {{ __('default.label.activity-index') }} </h4>
        </div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/../#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('default.label.back') }}"><i class="fas fa-arrow-left"></i></a>
          <a id="table-refresh" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ __('default.label.refresh') }}"><i class="fas fa-sync-alt"></i></a>
          <div data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true"><a class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="reload" data-toggle="tooltip" data-placement="top" title="" data-original-title="Filter"><i class="fas fa-filter"></i></a></div>
          <div class="dropdown dropdown-inline">
            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-download"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <ul class="navi navi-hover py-5">
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description-copy') }}">
                  <a href="javascript:void(0);" id="export_copy" class="navi-link"><i class="navi-icon fa fa-copy"></i> {{ __('default.label.export.copy') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description-excel') }}">
                  <a href="javascript:void(0);" id="export_excel" class="navi-link"><i class="navi-icon fa fa-file-excel"></i> {{ __('default.label.export.excel') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description-pdf') }}">
                  <a href="javascript:void(0);" id="export_pdf" class="navi-link"><i class="navi-icon fa fa-file-pdf"></i> {{ __('default.label.export.pdf') }}</a>
                </li>
                <li class="navi-item" data-toggle="tooltip" title="{{ __('default.label.export.description-print') }}">
                  <a href="javascript:void(0);" id="export_print" class="navi-link"><i class="navi-icon fa fa-print"></i> {{ __('default.label.export.print') }}</a>
                </li>
              </ul>
            </div>
          </div>
          <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

      <div class="card-body">

        <div class="accordion" id="accordionExample1">
          <div id="collapseOne1" class="collapse hide" data-parent="#accordionExample1">

            <div class="mb-2">
              <div class="col-lg-12 my-2 my-md-0">
                <div class="d-flex align-items-center">
                  <select data-column="2" class="form-control filter-form filter-status">
                    <option value=""> - {{ __('default.label.filter.status') }} - </option>
                    <option value="created"> {{ __('default.label.created') }} </option>
                    <option value="updated"> {{ __('default.label.updated') }} </option>
                    <option value="deleted"> {{ __('default.label.deleted') }} </option>
                  </select>
                </div>
              </div>
            </div>
            <hr>
          </div>
        </div>

        <div class="table-responsive">
          <table width="100%" class="table table-striped-table-bordered table-hover table-checkable" id="exilednoname">
            <thead>
              <tr>
                <th> No. </th>
                <th> </th>
                <th width="1"> Status </th>
                <th> Subject </th>
                <th width="1"> Causer </th>
                <th> Date </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

@endpush

@push('js')
<script src="{{ asset('/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
<script>
$(document).ready(function() {
  $('#toast-container').fadeOut(5000);
});

"use strict";
var KTDatatablesExtensionsKeytable = function() {

  var initTable2 = function() {
    var table = $('#exilednoname').DataTable({
      processing: true,
      "language": {
        processing: '<span class="font-weight-bolder text-center"> Please Wait ... </span>'
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
          d.filter_status = $('.filter_status').val();
          @stack('filter-function')
        }
     },
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
      buttons: [
        {
          extend: 'print',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'copyHtml5',
          autoClose: 'true',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export"
          },
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export",
            rows: { selected: true }
          },
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export",
            rows: { selected: true }
          },
        },
        {
          extend: 'copyHtml5',
          autoClose: 'true',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export",
            rows: { selected: true }
          },
        },
        {
          extend: 'print',
          exportOptions: {
            columns: "thead th:not(.no-export)",
            orthogonal: "Export",
            rows: { selected: true }
          },
        },
      ],
      columns: [
        {
          data: 'autonumber', orderable: false, orderable: false, searchable: false, 'width': '1',
          render: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },
        {
          data: 'description', orderable: false, 'className': 'align-middle', 'width': '1',
          render: function ( data, type, row ) {
            if ( data == 'created' ) { return '<span class="label label-dot label-success"></span>'; }
            else if ( data == 'updated' ) { return '<span class="label label-dot label-warning"></span>'; }
            else if ( data == 'deleted' ) { return '<span class="label label-dot label-danger"></span>'; }
            else if ( data == 'restored' ) { return '<span class="label label-dot label-info"></span>'; }
            else { return ''; }
          }
        },
        {
          data: 'description', orderable: true, 'className': 'align-middle',
          render: function ( data, type, row ) {
            if ( data == 'created' ) { return 'Created'; }
            else if ( data == 'updated' ) { return 'Updated'; }
            else if ( data == 'deleted' ) { return 'Deleted'; }
            else if ( data == 'restored' ) { return 'Restored'; }
            else { return ''; }
          }
        },
        { data: 'subjects' },
        { data: 'causer_id', 'className': 'align-middle text-nowrap', 'width': '1' },
        { data: 'updated_at', 'className': 'align-middle text-nowrap', 'width': '1' },
      ]
    });

    // FILTER DATA
    $('.filter-status').change(function () {
      table.column(2).search( $(this).val() ).draw();
    });

    $("#table-refresh").on("click", function() {
      $('#toolbar_delete').collapse('hide');
      $('.filter-form').val('');
      table.search( '' ).columns().search( '' ).draw();
      table.ajax.reload();
    });

    $('#export_print').on('click', function(e) { e.preventDefault(); table.button(0).trigger(); });
    $('#export_copy').on('click', function(e) { e.preventDefault(); table.button(1).trigger(); });
    $('#export_excel').on('click', function(e) { e.preventDefault(); table.button(2).trigger(); });
    $('#export_csv').on('click', function(e) { e.preventDefault(); table.button(3).trigger(); });
    $('#export_pdf').on('click', function(e) { e.preventDefault(); table.button(4).trigger(); });

  };

  return {
    init: function() {
      initTable2();
    },
  };

}();

jQuery(document).ready(function() {
  KTDatatablesExtensionsKeytable.init();
});
</script>
@endpush
