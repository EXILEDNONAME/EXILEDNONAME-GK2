@extends('pages.backend.__templates.datatable.trash')
@section('title', 'Management Roles')

@section('table-header')
<th> Name </th>
@endsection

@section('table-body')
{ data: 'name' },
@endsection