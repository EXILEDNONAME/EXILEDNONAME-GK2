@extends('pages.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true'])
@section('title', 'Family Members')

@section('table-header')
<th> Registered </th>
<th> Official </th>
<th> Verify </th>
<th> ID Bigo </th>
<th> Name </th>
<th> Phone </th>
<th> Area </th>
<th> Birthday </th>
<th> Recommendation </th>
@endsection

@section('table-body')
{ data: 'date_join' },
{
  data: 'official', orderable: true, 'className': 'align-middle text-center', 'width': '1',
  render: function ( data, type, row ) {
    if ( data == 0 ) { return 'No'; }
    if ( data == 1 ) { return '<i class="fas fa-award text-info"></i>'; }
    if ( data == 2 ) { return 'No'; }
  }
},
{
  data: 'verify', orderable: true, 'className': 'align-middle text-center', 'width': '1',
  render: function ( data, type, row ) {
    if ( data == 0 ) { return 'No'; }
    if ( data == 1 ) { return '<i class="flaticon2-correct text-success"></i>'; }
    if ( data == 2 ) { return 'No'; }
  }
},
{ data: 'id_bigo', orderable: true, 'className': 'align-middle text-nowrap', 'width': '1', },
{ data: 'name' },
{ data: 'phone' },
{ data: 'area' },
{ data: 'birthday' },
{ data: 'recommendation' },
@endsection
