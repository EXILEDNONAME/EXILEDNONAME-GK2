@extends('pages.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true'])
@section('title', 'Agency Broadcasters')

@section('table-header')
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'description' },
@endsection
