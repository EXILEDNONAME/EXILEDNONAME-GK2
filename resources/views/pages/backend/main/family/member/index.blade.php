@extends('pages.backend.__templates.datatable.index', ['page' => 'index', 'activity' => 'false', 'datetime' => 'false', 'graph' => 'false', 'status' => 'false'])
@push('title', 'Family Members')

@push('table-head')
<th> Registered </th>
<th> Official </th>
<th> Verify </th>
<th> ID Bigo </th>
<th> Name </th>
<th> Phone </th>
<th> Area </th>
<th> Birthday </th>
<th> Recommendation </th>
@endpush

@push('table-body')
{ data: 'date_join' },
{
  data: 'official', orderable: true, 'className': 'align-middle', 'width': '1',
  render: function ( data, type, row ) {
    if ( data == 0 ) { return 'No'; }
    if ( data == 1 ) { return 'Yes'; }
    if ( data == 2 ) { return 'No'; }
  }
},
{
  data: 'verify', orderable: true, 'className': 'align-middle', 'width': '1',
  render: function ( data, type, row ) {
    if ( data == 0 ) { return 'No'; }
    if ( data == 1 ) { return 'Yes'; }
    if ( data == 2 ) { return 'No'; }
  }
},
{ data: 'id_bigo', orderable: true, 'className': 'align-middle text-nowrap', 'width': '1', },
{ data: 'name' },
{ data: 'phone' },
{ data: 'area' },
{ data: 'birthday' },
{ data: 'recommendation' },
@endpush
