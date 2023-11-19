@extends('layouts.default')
@section('title', 'Schedule PK')

@push('head')
<style>
table.fixed {
  table-layout: fixed;
}
</style>
@endpush

@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-warning gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/party" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK PARTY <br>
          {{ env('SHEET_PK_PARTY') }}
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-info gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/weekend" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK WEEKEND <br>
          {{ env('SHEET_PK_WEEKEND_1') }} - {{ env('SHEET_PK_WEEKEND_2') }}
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
