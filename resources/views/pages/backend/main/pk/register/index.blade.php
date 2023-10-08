@extends('pages.backend.__templates.datatable.index', ['activity' => 'false', 'datetime' => 'true', 'graph' => 'false', 'status' => 'true'])
@push('title', 'PK Registers')

@push('table-head')
<th> Name </th>
<th> Description </th>
@endpush

@push('table-body')
{ data: 'name' },
{ data: 'description' },
@endpush
