@extends('layouts.default_noauth', ['page' => 'index'])
@push('title', 'Sche')

@push('head')
<link href="/assets/backend/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css" />
@endpush

@push('layout-content')
<!-- TABLE EVENT CONTENT CHALLENGES -->
<div class="card card-custom gutter-b" data-card="true">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label"> EVENT CONTENT CHALLENGES </h3>
    </div>
    <div class="card-toolbar">
      <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
    </div>
  </div>
  <div class="card-body">
    <div class="alert alert-primary" role="alert">
      Master Data : <a href="/dashboard/events/content-challenges" target="_blank" class="alert-link"> Source </a><br>
    </div>
    <hr>
    <div class="table-responsive">
      <table width="100%" class="table table-hover table-bordered table-sm" id="data_event_content_challenge">
        <thead>
          <tr>
            <th> No. </th>
            <th> CODE AGENCY </th>
            <th> ID </th>
            <th> DATE </th>
            <th> TIME </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>

<div class="card card-custom gutter-b" data-card="true">
  <div class="card-header">
    <div class="card-title">
      <h3 class="card-label"> EVENT CONTENT FESTIVALS </h3>
    </div>
    <div class="card-toolbar">
      <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
    </div>
  </div>
  <div class="card-body">
    <div class="alert alert-primary" role="alert">
      Master Data : <a href="/dashboard/events/content-festivals" target="_blank" class="alert-link"> Source </a><br>
    </div>
    <hr>
    <div class="table-responsive">
      <table width="100%" class="table table-hover table-bordered table-sm" id="data_event_content_festival">
        <thead>
          <tr>
            <th> No. </th>
            <th> CODE AGENCY </th>
            <th> ID </th>
            <th> DATE </th>
            <th> START </th>
            <th> FINISH </th>
            <th> CONTENT </th>
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

<!-- TABLE EVENT CONTENT CHALLENGES -->
<script>
"use strict";
$('#data_event_content_challenge').DataTable({
  processing: true, serverSide: true, searching: true,
  ajax: { url: "{{ URL::current() }}/events/content-challenges", },
  "lengthMenu": [[25, 100, 250, 999, -1], [25, 100, 250, 999, "All"]],
  columns: [
    {
      data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function(data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },
    { data: 'COL 4', 'className': 'align-middle text-center text-nowrap' },
    { data: 'COL 2', 'className': 'align-middle text-center text-nowrap' },
    { data: 'COL 5', 'className': 'align-middle text-center text-nowrap' },
    { data: 'COL 6', 'className': 'align-middle text-center text-nowrap' },
  ],
  order: [
    [3, 'asc']
  ]
});
</script>

<!-- TABLE EVENT CONTENT FESTIVALS -->
<script>
"use strict";
$('#data_event_content_festival').DataTable({
  processing: true, serverSide: true, searching: true,
  ajax: { url: "{{ URL::current() }}/events/content-festivals", },
  "lengthMenu": [[25, 100, 250, 999, -1], [25, 100, 250, 999, "All"]],
  columns: [
    {
      data: 'autonumber', orderable: false, searchable: false, 'className': 'align-middle text-center', 'width': '1',
      render: function(data, type, row, meta) {
        return meta.row + meta.settings._iDisplayStart + 1;
      }
    },
    { data: 'COL 4', 'className': 'align-middle text-center text-nowrap' },
    { data: 'COL 1', 'className': 'align-middle text-center text-nowrap' },
    { data: 'COL 3', 'className': 'align-middle text-center text-nowrap' },
    { data: 'COL 5', 'className': 'align-middle text-center text-nowrap' },
    { data: 'COL 6', 'className': 'align-middle text-center text-nowrap' },
    { data: 'COL 7', 'className': 'align-middle text-center text-nowrap' },
  ],
  order: [
    [3, 'asc']
  ]
});
</script>
@endpush
