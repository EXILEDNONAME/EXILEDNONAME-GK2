@extends('pages.backend.__templates.datatable.index', ['activity' => 'true', 'graph' => 'true'])
@push('title', 'Management Users')

@push('table-head')
<th> Name </th>
<th> Email </th>
<th> Phone </th>
<th> Username </th>
@endpush

@push('table-body')
{ data: 'name' },
{ data: 'email' },
{ data: 'phone' },
{ data: 'username' },
@endpush
