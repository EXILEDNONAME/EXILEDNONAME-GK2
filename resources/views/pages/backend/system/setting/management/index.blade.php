@extends('layouts.default')
@push('title', 'Setting Managements')

@push('layout-content')
<div class="row">

  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-2.svg)">
      <div class="card-body">
        <div class="font-weight-bold text-info"><a href="{{ URL::Current() }}/accesses"> Management Accesses </a></div>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(/assets/backend/media/svg/shapes/abstract-2.svg)">
      <div class="card-body">
        <div class="font-weight-bold text-info"><a href="{{ URL::Current() }}/users"> Management Users </a></div>
      </div>
    </div>
  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/widgets.js?v=7.0.6"></script>
@endpush
