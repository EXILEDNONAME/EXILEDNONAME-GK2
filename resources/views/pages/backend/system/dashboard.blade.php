@extends('layouts.default', ['page' => 'dashboard'])
@push('title', 'Dashboard')

@push('layout-content')
@if ($message = Session::get('success'))
<div id="toast-container" class="toast-bottom-right">
  <div class="toast toast-success" aria-live="polite">
    <div class="toast-message">{{ $message }}</div>
  </div>
</div>
@endif

@if ($message = Session::get('error'))
<div id="toast-container" class="toast-bottom-right">
  <div class="toast toast-error" aria-live="polite">
    <div class="toast-message">{{ $message }}</div>
  </div>
</div>
@endif

DUMP <br>
@php
$time = "2h 26m 40s";
echo $time . '<br><br>';
$data = array_combine(['hour', 'minute', 'second'], sscanf($time, '%s %s %s'));
print_r($data);

echo '<br><br>';
$data_hour = substr_replace($data['hour'] ,"", -1);
$data_minute = substr_replace($data['minute'] ,"", -1);
$data_second = substr_replace($data['second'] ,"", -1);

echo ($data_hour*60) + ($data_minute*1) + ($data_second/60);
@endphp


@endpush
