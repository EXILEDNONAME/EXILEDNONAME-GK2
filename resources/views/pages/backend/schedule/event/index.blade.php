@extends('layouts.default')
@section('title', 'Schedule Events')

@push('head')
<style>
table.fixed {
  table-layout: fixed;
}
</style>
@endpush

@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-4 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-info gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/content-challenges" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> CONTENT CHALLENGES
        </a>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-warning gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/indonesia-content-festivals" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          INDONESIA CONTENT FESTIVALS <br> (ICF)
        </a>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-primary gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/e-commerce" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> E-COMMERCE
        </a>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-success gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/special-talent-live-house" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
           SPECIAL TALENT <br> LIVE HOUSE
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
