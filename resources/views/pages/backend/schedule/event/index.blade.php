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
  <div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-body d-flex align-items-center py-0 mt-8">
        <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
          <a href="{{ URL::Current() }}/bigo-content-challenges" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Top Authors</a>
          <span class="font-weight-bold text-muted font-size-lg">Most Awards Earned</span>
        </div>
        <img src="/assets/backend/media/svg/avatars/029-boy-11.svg" alt="" class="align-self-end h-100px">
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-body d-flex align-items-center py-0 mt-8">
        <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
          <a href="{{ URL::Current() }}/bigo-indonesia-content-festivals" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">New Bestsellers</a>
          <span class="font-weight-bold text-muted font-size-lg">Rising Stars</span>
        </div>
        <img src="/assets/backend/media/svg/avatars/014-girl-7.svg" alt="" class="align-self-end h-100px">
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-body d-flex align-items-center py-0 mt-8">
        <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
          <a href="#" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Known Experts</a>
          <span class="font-weight-bold text-muted  font-size-lg">Ask Everything You Wish</span>
        </div>
        <img src="/assets/backend/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card card-custom card-stretch gutter-b">
      <div class="card-body d-flex align-items-center py-0 mt-8">
        <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
          <a href="#" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Known Experts</a>
          <span class="font-weight-bold text-muted  font-size-lg">Ask Everything You Wish</span>
        </div>
        <img src="/assets/backend/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
      </div>
    </div>
  </div>
</div>
@endsection
