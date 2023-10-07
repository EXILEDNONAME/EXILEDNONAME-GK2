@extends('pages.backend.__templates.datatable.custom_index', ['activity' => 'false', 'datetime' => 'false', 'graph' => 'false', 'status' => 'false'])
@push('title', 'Content Festivals')

@push('alert')
<div class="alert alert-primary" role="alert">
  Master Data : <a href="https://docs.google.com/spreadsheets/d/17cHkh45mBs_7PzKh8rsqKyf9mthUHeUPlR5nquvnLGI/edit#gid=1507637216" target="_blank" class="alert-link"> Source </a><br>
  Get New Data From : <a href="https://docs.google.com/spreadsheets/d/17cHkh45mBs_7PzKh8rsqKyf9mthUHeUPlR5nquvnLGI/export?format=csv&gid=1507637216" target="_blank" class="alert-link"> Source </a><br>
</div>
<hr>
@endpush

@push('table-head')
<th> CODE AGENCY </th>
<th> ID </th>
<th> DATE </th>
<th> START </th>
<th> FINISH </th>
<th> CONTENT </th>
@endpush

@push('table-body')
{ data: 'COL 4', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 1', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 3', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 5', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 6', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 7', 'className': 'align-middle text-center text-nowrap' },
@endpush
