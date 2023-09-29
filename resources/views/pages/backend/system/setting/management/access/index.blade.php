@extends('pages.backend.__templates.datatable.index', ['activity' => 'true', 'graph' => 'true'])
@push('title', 'Management Accesses')

@push('table-head')
<th> Name </th>
<th> Description </th>
@endpush

@push('table-body')
{ data: 'name' },
{ data: 'description' },
@endpush
