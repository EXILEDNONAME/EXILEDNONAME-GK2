@extends('pages.backend.__templates.datatable.custom_index', ['activity' => 'false', 'datetime' => 'false', 'graph' => 'false', 'status' => 'false'])
@push('title', 'PK Party')

@push('alert')
<div class="alert alert-primary" role="alert">
  Master Data : <a href="https://docs.google.com/spreadsheets/d/1yLPaYvEhsCLE7lid0dbgE7zZPnjvHDzkv1JUrAqeFRY/edit#gid=977401684" target="_blank" class="alert-link"> Source </a><br>
  Get New Data From : <a href="https://docs.google.com/spreadsheets/d/1yLPaYvEhsCLE7lid0dbgE7zZPnjvHDzkv1JUrAqeFRY/export?format=csv&gid=977401684" target="_blank" class="alert-link"> Source </a><br>
</div>
<hr>
@endpush

@push('table-head')
<th> ID </th>
<th> NAME </th>
<th> SCHEDULE </th>
<th> NAME </th>
<th> ID </th>
<th> EVENT </th>
@endpush

@push('table-body')
{ data: 'COL 3', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 5', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 2', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 15', 'className': 'align-middle text-center text-nowrap' },
{ data: 'COL 17', 'className': 'align-middle text-center text-nowrap' },
{ data: 'event', 'className': 'align-middle text-center text-nowrap' },
@endpush
