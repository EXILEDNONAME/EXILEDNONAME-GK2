@extends('layouts.default')
@push('title', 'Customizations')

@push('layout-content')
<div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
  <div class="card-header py-3">
    <div class="card-title align-items-start flex-column">
      <h3 class="card-label font-weight-bolder text-dark"> Customizations </h3>
      <span class="text-muted font-weight-bold font-size-sm mt-1"> Change Global Settings </span>
    </div>
    <div class="card-toolbar">
      <div class="btn-group">
        <button type="submit" class="btn btn-outline-primary" form="form-exilednoname" data-toggle="tooltip" title="{{ __('system.label.save')}}">
          <i class="flaticon2-paperplane"></i> <span class="font-weight-bolder"> </span>
        </button>
      </div>
    </div>
  </div>
  <div class="card-body">

    <form method="POST" id="form-exilednoname" action="{{ URL::current() }}/update/{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
      {{ method_field('PATCH') }}
      {{ csrf_field() }}

      @if ($message = Session::get('success'))
      <div class="alert alert-success" role="alert"> {{ $message }} </div><hr>
      @endif

      @if ($message = Session::get('error'))
      <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
      @endif

      <input class="form-control" name="created_by" type="hidden" value="{{ Auth::User()->id }}">

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Name </label>
        <div class="col-lg-9">
          {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class($errors->has('name') ? 'form-control is-invalid' : 'form-control')->required() }}
          @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <div class="col-lg-3 col-form-label"> {{ __('system.label.sticky') }} </div>
        <div class="col-lg-9">
          {{ Html::select('sticky', ['1' => __('system.label.yes'), '0' => __('system.label.no')], (isset($data->sticky) ? $data->sticky : ''))->class($errors->has('active') ? 'form-control is-invalid' : 'form-control')->placeholder('- Select Status Sticky -')->required() }}
          @error('sticky') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Version </label>
        <div class="col-lg-9">
          {{ Html::text('version', (isset($data->version) ? $data->version : ''))->class($errors->has('version') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid')->isReadonly() }}
          @error('version') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>
      
    </form>

  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-switch.js?v=7.0.6"></script>
@endpush
