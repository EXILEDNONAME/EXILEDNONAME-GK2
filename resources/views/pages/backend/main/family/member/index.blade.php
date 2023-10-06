@extends('pages.backend.__templates.datatable.index', ['activity' => 'false', 'datetime' => 'false', 'graph' => 'false', 'status' => 'false'])
@push('title', 'Family Members')

@push('table-head')
<th> Official </th>
<th> Verify </th>
<th> Name </th>
<th> Phone </th>
<th> ID Bigo </th>
<th> Area </th>
<th> Birthday </th>
@endpush

@push('table-body')
{ data: 'official' },
{ data: 'verify' },
{ data: 'name' },
{ data: 'phone' },
{ data: 'id_bigo' },
{ data: 'area' },
{ data: 'birthday' },
@endpush
