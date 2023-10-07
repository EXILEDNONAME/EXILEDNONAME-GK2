@extends('pages.backend.__templates.datatable.custom_index', ['activity' => 'false', 'datetime' => 'false', 'graph' => 'false', 'status' => 'false'])
@push('title', 'Special Talent Live House')

@push('alert')
<div class="alert alert-primary" role="alert">
  Master Data : <a href="https://docs.google.com/spreadsheets/d/1UMx11vwSrFFcUczxTXJvT-xyNj75YsVN54yttNx7KCg/edit?pli=1#gid=1626295954" target="_blank" class="alert-link"> Source </a><br>
  Get New Data From : <a href="https://docs.google.com/spreadsheets/d/1UMx11vwSrFFcUczxTXJvT-xyNj75YsVN54yttNx7KCg/export?format=csv&gid=1626295954" target="_blank" class="alert-link"> Source </a><br>
</div>
<hr>
@endpush

@push('table-head')
<th> CODE AGENCY </th>
<th> ID </th>
<th> DATE </th>
<th> TIME </th>
<th> CONTENT </th>
@endpush

@push('table-body')
{ data: 'COL 5', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 2', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 4', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 6', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 7', 'className': 'align-middle text-center text-nowrap' },
@endpush
