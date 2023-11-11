@extends('pages.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true', 'status' => 'true', 'active' => 'false'])
@section('title', 'Table Permissions')

@section('table-header')
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'description' },
@endsection
