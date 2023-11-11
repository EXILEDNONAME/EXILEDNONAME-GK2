@extends('pages.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true', 'status' => 'true'])
@section('title', 'Events')

@section('table-header')
<th> Event </th>
<th> Content </th>
<th> Date </th>
<th> Name </th>
<th> ID Bigo </th>
@endsection

@section('table-body')
{ data: 'event', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'content', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'date', 'className': 'align-middle text-nowrap', 'width': '1' },
{ data: 'name' },
{ data: 'id_bigo' },
@endsection
