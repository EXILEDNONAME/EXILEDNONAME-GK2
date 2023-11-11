@extends('pages.backend.__templates.datatable.index', ['page' => 'datatable-index', 'activity' => 'true', 'chart' => 'true', 'datetime' => 'true', 'status' => 'true'])
@section('title', 'Table Relations')

@section('table-header')
<th> Table General </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'id_table_generals' },
{ data: 'description' },
@endsection
