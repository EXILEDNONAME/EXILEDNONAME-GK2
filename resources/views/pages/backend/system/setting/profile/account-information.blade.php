@extends('layouts.default')
@push('title', 'Account Informations')

@push('layout-content')
<div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
  <div class="card-header py-3">
    <div class="card-title align-items-start flex-column">
      <h3 class="card-label font-weight-bolder text-dark"> {{ __('system.label.profile.account-information') }} </h3>
      <span class="text-muted font-weight-bold font-size-sm mt-1"> {{ __('system.label.profile.description-account-information') }} </span>
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
        <label class="col-lg-3 col-form-label"> Access </label>
        <div class="col-lg-9">
          {{ Html::text('id_access', (isset($data->accesses->name) ? $data->accesses->name : ''))->class($errors->has('id_access') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid')->isReadOnly() }}
          @error('id_access') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Username </label>
        <div class="col-lg-9">
          {{ Html::text('username', (isset($data->username) ? $data->username : ''))->class($errors->has('username') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid')->isReadOnly() }}
          @error('username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Email </label>
        <div class="col-lg-9">
          {{ Html::text('email', (isset($data->email) ? $data->email : ''))->class($errors->has('email') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid')->isReadOnly() }}
          @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Phone </label>
        <div class="col-lg-9">
          {{ Html::text('phone', (isset($data->phone) ? $data->phone : ''))->class($errors->has('phone') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid')->isReadOnly() }}
          @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Name </label>
        <div class="col-lg-9">
          {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class($errors->has('name') ? 'form-control is-invalid' : 'form-control') }}
          @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

      <div class="form-group row">
        <label class="col-lg-3 col-form-label"> Address </label>
        <div class="col-lg-9">
          {{ Html::text('address_1', (isset($data->address_1) ? $data->address_1 : ''))->class($errors->has('address_1') ? 'form-control is-invalid' : 'form-control') }}
          @error('address_1') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>
      </div>

    </form>

  </div>
</div>
@endpush
