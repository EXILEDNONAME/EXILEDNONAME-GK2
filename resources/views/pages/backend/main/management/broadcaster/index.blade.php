@extends('pages.backend.__templates.datatable.index', ['activity' => 'false', 'datetime' => 'false', 'graph' => 'false', 'status' => 'false'])
@push('title', 'Broadcasters')

@push('table-head')
<th> Name </th>
<th> Description </th>
@endpush

@push('table-body')
{ data: 'name' },
{ data: 'description' },
@endpush
