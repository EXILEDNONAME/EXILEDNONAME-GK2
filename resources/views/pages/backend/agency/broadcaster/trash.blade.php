@extends('pages.backend.__templates.datatable.trash')
@section('title', 'Agency Broadcasters')

@section('table-header')
<th> Name </th>
<th> Description </th>
@endsection

@section('table-body')
{ data: 'name' },
{ data: 'description' },
@endsection
