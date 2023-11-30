@extends('pages.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'false', 'chart' => 'false', 'status' => 'false'])
@section('title', 'Controller Dashboard')

@section('table-header')
<th> Sync </th>
<th> File Modified </th>
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{
  data: 'sync', orderable: true, 'className': 'align-middle text-center', 'width': '1',
  render: function ( data, type, row ) {
    return '<a href="javascript:void(0);" id="synchronization" data-toggle="tooltip" data-id="' + row.id + '"><div class="spinner spinner-track spinner-success"></div></a>';
  }
},
{ data: 'file_modified', orderable: true, 'className': 'text-nowrap', 'width': '1' },
{ data: 'name' },
{ data: 'description' },
@endsection
