@extends('pages.backend.__templates.datatable.trash')
@section('title', 'Table Relations')

@section('table-header')
<th> Table General </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'id_table_generals' },
{ data: 'description' },
@endsection
