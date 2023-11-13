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
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('main.label.schedules') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="javascript:void(0);" class="btn btn-icon btn-xs btn-hover-light-primary" data-card-tool="toggle"><i class="fas fa-caret-down"></i></a>
        </div>
      </div>

      <div class="card-body" style="">
        @include('pages.backend.schedule.event.content.event-bigo-content-challenge')
        @include('pages.backend.schedule.event.content.event-bigo-indonesia-content-festival')
        @include('pages.backend.schedule.event.content.event-bigo-e-commerce')
      </div>

    </div>
  </div>
</div>
@endsection
