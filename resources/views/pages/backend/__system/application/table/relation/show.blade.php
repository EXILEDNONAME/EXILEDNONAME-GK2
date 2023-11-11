@extends('pages.backend.__templates.datatable.show', ['datetime' => 'true', 'status' => 'true'])
@section('title', 'Table Relations')

@push('content')
<tr>
  <td class="align-middle font-weight-bold"> Table General </td>
  <td class="align-middle"> {!! $data->application_table_generals->name !!} </td>
</tr>
<tr>
  <td class="align-middle font-weight-bold"> Description </td>
  <td class="align-middle"> {!! nl2br(e($data->description)) !!} </td>
</tr>
@endpush
