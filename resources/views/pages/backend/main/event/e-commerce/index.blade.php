@extends('pages.backend.__templates.datatable.custom_index', ['activity' => 'false', 'datetime' => 'false', 'graph' => 'false', 'status' => 'false'])
@push('title', 'E-Commerce')

@push('alert')
<div class="alert alert-primary" role="alert">
  Master Data : <a href="https://docs.google.com/spreadsheets/d/1sTXX1PUjq0Vg310d76m1pBoWaif-Pa7hru-kZ7J0NYk/edit#gid=0" target="_blank" class="alert-link"> Source </a><br>
  Get New Data From : <a href="https://docs.google.com/spreadsheets/d/1sTXX1PUjq0Vg310d76m1pBoWaif-Pa7hru-kZ7J0NYk/export?format=csv&gid=0" target="_blank" class="alert-link"> Source </a><br>
</div>
<hr>
@endpush

@push('table-head')
<th> CODE AGENCY </th>
<th> ID </th>
<th> DATE </th>
<th> TIME </th>
@endpush

@push('table-body')
{ data: 'COL 3', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 2', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 4', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 5', 'className': 'align-middle text-center text-nowrap' },
@endpush
