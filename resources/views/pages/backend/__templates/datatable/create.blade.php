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
      <div class="card-body" style="">

        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
        @endif

        <form method="POST" id="form-exilednoname" action="{{ URL::current() }}/../" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ csrf_field() }}

          <input class="form-control" name="created_by" type="hidden" value="{{ Auth::User()->id }}">

          @if (!empty($datetime) && $datetime == 'true')
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Date Start </label>
            <div class="col-lg-9">
              <div class="input-group input-group-solid date" id="ex_datetimepicker_date_start" data-target-input="nearest">
                <input name="date_start" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select Date Start -" data-target="#ex_datetimepicker_date_start" value="{{ isset($data->date_start) ? $data->date_start : '' }}">
                <div class="input-group-append" data-target="#ex_datetimepicker_date_start" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="ki ki-calendar"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> Date End </label>
            <div class="col-lg-9">
              <div class="input-group input-group-solid date" id="ex_datetimepicker_date_end" data-target-input="nearest">
                <input name="date_end" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select Date End -" data-target="#ex_datetimepicker_date_end" value="{{ isset($data->date_end) ? $data->date_end : '' }}">
                <div class="input-group-append" data-target="#ex_datetimepicker_date_end" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="ki ki-calendar"></i></span>
                </div>
              </div>
            </div>
          </div>
          @endif

          @include($path . 'form', ['formMode' => 'create'])

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> {{ __('system.label.active') }} </label>
            <div class="col-lg-9">
              {{ Form::select('active', ['1' => __('system.label.yes'), '0' => __('system.label.no')], (isset($data->active) ? $data->active : '1'), ['class' => $errors->has('active') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) }}
              @error('active') <span class="invalid-feedback" role="alert"><strong> {{ $message }} </strong></span> @enderror
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> {{ __('system.label.sort') }} </label>
            <div class="col-lg-9">
              @php $table = (new $model)->getTable(); @endphp
              @if (DB::table($table)->count() == 0)
              @php $sorting = 1; @endphp
              @else
              @php
              $count = DB::table($table)->count();
              $data_table = DB::table($table)->orderBy('id', 'desc')->first();
              $sorting = $data_table->id + 1;
              @endphp
              @endif
              {!! Form::text('sort', (isset($data->sort) ? $data->sort : $sorting), ['class' => $errors->has('sort') ? 'form-control is-invalid' : 'form-control']) !!}
              @error('sort') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
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
