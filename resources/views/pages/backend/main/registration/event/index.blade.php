@extends('pages.backend.__templates.datatable.index', ['activity' => 'false', 'datetime' => 'false', 'date' => 'true', 'graph' => 'false', 'status' => 'true'])
@push('title', 'Registration Events')

@push('table-head')
<th> Name </th>
<th> ID Bigo </th>
<th> Date </th>
<th> Event </th>
<th> Content </th>
@endpush

@push('table-body')
{ data: 'name' },
{ data: 'id_bigo' },
{ data: 'date' },
{ data: 'event' },
{ data: 'content' },
@endpush
