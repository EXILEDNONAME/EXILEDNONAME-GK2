@extends('pages.backend.__templates.datatable.index', ['activity' => 'false', 'datetime' => 'true', 'graph' => 'false', 'status' => 'true'])
@push('title', 'Table Relations')

@push('table-head')
<th> Name </th>
<th> Description </th>
@endpush

@push('table-body')
{ data: 'id_generals' },
{ data: 'description' },
@endpush

@push('filter-head')
<div class="mb-2">
  <div class="col-lg-12 my-2 my-md-0">
    <div class="d-flex align-items-center">
      {{ Html::select(NULL, filter_table_generals(), NULL)->class('form-control filter-form filter_table_generals')->placeholder('- Select General -') }}
    </div>
  </div>
</div>
@endpush

@push('filter-data')
d.filter_table_generals = $('.filter_table_generals').val();
@endpush

@push('filter-function')
$('.filter_table_generals').change(function () { table.column(5).search( $(this).val() ).draw(); });
@endpush
