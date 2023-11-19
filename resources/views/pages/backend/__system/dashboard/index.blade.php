@extends('layouts.default', ['page' => 'dashboard'])
@section('title', 'Dashboard')


@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-warning gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/pk/epical-glory" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK EPICAL GLORY <br>
          {{ env('SHEET_PK_EPICAL_GLORY') }}
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-6">
    <div class="card card-custom wave wave-animate-slow wave-warning gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/pk/party" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK PARTY <br>
          {{ env('SHEET_PK_PARTY') }}
        </a>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="card card-custom wave wave-animate-slow wave-danger gutter-b">
      <div class="card-body text-center">
        <a href="{{ URL::Current() }}/schedules/pk/weekend" class="text-dark text-hover-primary font-weight-bold mb-3 text-center">
          PK WEEKEND <br>
          {{ env('SHEET_PK_WEEKEND_1') }} - {{ env('SHEET_PK_WEEKEND_2') }}
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
          INDONESIA CONTENT FESTIVALS (ICF) <br>
          {{ env('SHEET_EVENT_ICF') }}
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
