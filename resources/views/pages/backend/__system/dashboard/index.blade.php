@extends('layouts.default', ['page' => 'dashboard'])
@section('title', 'Dashboard')


@section('content')
<div class="row">
  <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="card card-custom wave wave-animate-slow wave-danger gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/pk/party" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> PK PARTY
        </a>
      </div>
    </div>
  </div> -->
  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="card card-custom wave wave-animate-slow wave-danger gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/pk/weekend" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> PK WEEKEND
        </a>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-3 col-lg-4 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-info gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/events/content-challenges" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> CONTENT CHALLENGES
        </a>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-warning gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/events/indonesia-content-festivals" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> INDONESIA CONTENT FESTIVALS
        </a>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-primary gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/events/e-commerce" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          BIGO <br> E-COMMERCE
        </a>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-success gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/events/special-talent-live-house" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
           SPECIAL TALENT <br> LIVE HOUSE
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
