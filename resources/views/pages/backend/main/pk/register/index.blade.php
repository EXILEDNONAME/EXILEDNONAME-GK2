@extends('pages.backend.__templates.datatable.index', ['activity' => 'false', 'datetime' => 'false', 'date' => 'true', 'graph' => 'false', 'status' => 'true'])
@push('title', 'PK Registers')

@push('table-head')
<th> Name </th>
<th> Date </th>
<th> Description </th>
@endpush

@push('table-body')
{ data: 'name' },
{ data: 'date' },
{ data: 'description' },
@endpush
