@extends('pages.backend.__templates.datatable.custom_index', ['activity' => 'false', 'datetime' => 'false', 'graph' => 'false', 'status' => 'false'])
@push('title', 'PK Epical Glory')

@push('alert')
<div class="alert alert-primary" role="alert">
  Master Data : <a href="https://docs.google.com/spreadsheets/d/113RSLMkRaGvcc1SDuDMzeeSoH2wDmyfsU36guaieT3w/edit#gid=1200695897" target="_blank" class="alert-link"> Source </a><br>
  Get New Data From : <a href="https://docs.google.com/spreadsheets/d/113RSLMkRaGvcc1SDuDMzeeSoH2wDmyfsU36guaieT3w/export?format=csv&gid=1200695897" target="_blank" class="alert-link"> Source </a><br>
</div>
<hr>
@endpush

@push('table-head')
<th> EVENT </th>
<th> AGENCY </th>
<th> ID </th>
<th> NAME </th>
<th> SCHEDULE </th>
<th> NAME </th>
<th> ID </th>
<th> AGENCY </th>
@endpush

@push('table-body')
{ data: 'event', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 3', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 6', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 5', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 2', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 14', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 16', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 17', 'className': 'align-middle text-center text-nowrap' },
@endpush
