@extends('layouts.default')

@push('layout-content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title"><h3 class="card-label"> {{ __('system.label.create') }} </h3></div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/../#" class="btn btn-outline-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i> {{ __('system.label.back') }}
          </a>
          <div class="btn-group">
            <button type="submit" class="btn btn-outline-primary" form="form-exilednoname">
              <i class="flaticon2-paperplane"></i> <span class="font-weight-bolder"> {{ __('system.label.save') }} </span>
            </button>
          </div>
        </div>
      </div>
      <div class="card-body">

        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
        @endif

        <form method="POST" id="form-exilednoname" action="{{ URL::current() }}/../" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}

          <input class="form-control" name="created_by" type="hidden" value="{{ Auth::User()->id }}">

          @if (!empty($datetime) && $datetime == 'true')
          <div class="form-group row">
            <div class="col-lg-3 col-form-label"> {{ __('system.label.date-start') }} </div>
            <div class="col-lg-9">
              <div class="input-group input-group-solid date" id="ex_datetimepicker_date_start" data-target-input="nearest">
                <input name="date_start" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select {{ __('system.label.date-start') }} -" data-target="#ex_datetimepicker_date_start" value="{{ isset($data->date_start) ? $data->date_start : '' }}" autocomplete="off">
                <div class="input-group-append" data-target="#ex_datetimepicker_date_start" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="ki ki-calendar"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3 col-form-label"> {{ __('system.label.date-end') }} </div>
            <div class="col-lg-9">
              <div class="input-group input-group-solid date" id="ex_datetimepicker_date_end" data-target-input="nearest">
                <input name="date_end" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select {{ __('system.label.date-end') }} -" data-target="#ex_datetimepicker_date_end" value="{{ isset($data->date_end) ? $data->date_end : '' }}" autocomplete="off">
                <div class="input-group-append" data-target="#ex_datetimepicker_date_end" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="ki ki-calendar"></i></span>
                </div>
              </div>
            </div>
          </div>
          @endif

          @if ( !empty($status) && $status == 'true')
          <div class="form-group row">
            <div class="col-lg-3 col-form-label"> {{ __('system.label.status') }} </div>
            <div class="col-lg-9">
              {{ Html::select('status', ['1' => __('system.label.success'), '2' => __('system.label.pending')], (isset($data->status) ? $data->status : NULL))->class($errors->has('status') ? 'form-control is-invalid' : 'form-control')->placeholder('- Select ' . __('system.label.status') . ' -')->required() }}
              @error('status') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>
          @endif

          @include($path . 'form', ['formMode' => 'create'])

          <div class="form-group row">
            <div class="col-lg-3 col-form-label"> {{ __('system.label.active') }} </div>
            <div class="col-lg-9">
              {{ Html::select('active', ['1' => __('system.label.yes'), '0' => __('system.label.no')], (isset($data->active) ? $data->active : '1'))->class($errors->has('active') ? 'form-control is-invalid' : 'form-control')->required() }}
              @error('active') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
@endpush
