@extends('layouts.default')

@push('layout-content')
<div class="row">
  <div class="col-lg-12">
    <div class="card card-custom gutter-b card-sticky" data-card="true" id="kt_page_sticky_card">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label"> {{ __('system.label.edit') }} </h3>
        </div>
        <div class="card-toolbar">
          <a href="{{ URL::Current() }}/../../#" class="btn btn-outline-primary font-weight-bolder mr-2">
            <i class="ki ki-long-arrow-back icon-xs"></i>
            {{ __('system.label.back') }}
          </a>
          <div class="btn-group">
            <button type="submit" class="btn btn-outline-primary mr-2" form="form-exilednoname">
              <i class="flaticon2-paperplane"></i> <span class="font-weight-bolder"> {{ __('system.label.update') }} </span>
            </button>
          </div>
          <div class="btn-group">
            <a data-toggle="modal" data-target="#details" class="btn btn-outline-primary font-weight-bolder">
              <i class="fas fa-expand ml-1"></i>
            </a>
          </div>


        </div>
      </div>
      <div class="card-body" style="">

        @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert"> {{ $message }} </div><hr>
        @endif

        <form method="POST" id="form-exilednoname" action="{{ URL::current() }}/../../{{ $data->id }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

          <input class="form-control" name="id" type="hidden" value="{{ $data->id }}">
          <input class="form-control" name="updated_by" type="hidden" value="{{ Auth::User()->id }}">

          @if ( !empty($daterange) && $daterange == 'true')
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> {{ __('system.label.date-start') }} </label>
            <div class="col-lg-9">
              <div class="input-group input-group-solid date" id="ex_datetimepicker_date_start" data-target-input="nearest">
                <input name="date_start" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select {{ __('system.label.date-start') }} -" data-target="#ex_datetimepicker_date_start" value="{{ isset($data->date_start) ? $data->date_start : '' }}">
                <div class="input-group-append" data-target="#ex_datetimepicker_date_start" data-toggle="datetimepicker">
                  <span class="input-group-text"><i class="ki ki-calendar"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> {{ __('system.label.date-end') }} </label>
            <div class="col-lg-9">
              <div class="input-group input-group-solid date" id="ex_datetimepicker_date_end" data-target-input="nearest">
                <input name="date_end" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select {{ __('system.label.date-end') }} -" data-target="#ex_datetimepicker_date_end" value="{{ isset($data->date_end) ? $data->date_end : '' }}">
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
              {{ Html::select('status', ['1' => __('system.label.success'), '2' => __('system.label.pending')], (isset($data->status) ? $data->status : NULL))->class($errors->has('status') ? 'form-control is-invalid' : 'form-control')->placeholder(__('system.label.select-pending'))->required() }}
              @error('status') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
            </div>
          </div>
          @endif

          @include($path . 'form', ['formMode' => 'edit'])

          <div class="form-group row">
            <label class="col-lg-3 col-form-label"> {{ __('system.label.active') }} </label>
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

<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> {{ __('system.label.details') }} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">

        <div class="table-responsive">
        <table width="100%" class="table table-bordered table-checkable" id="exilednoname">
          @if (!empty($datetime) && $datetime == 'true')
          <tr class="text-nowrap">
            <td class="align-middle font-weight-bold" width="300"> {{ __('system.label.date-start') }} </td>
            <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date_start)->format('d F Y, H:i') }} </td>
          </tr>
          <tr class="text-nowrap">
            <td class="align-middle font-weight-bold" width="300"> {{ __('system.label.date-end') }} </td>
            <td class="align-middle"> {{ \Carbon\Carbon::parse($data->date_end)->format('d F Y, H:i') }} </td>
          </tr>
          @endif

          @include($path . 'view', ['formMode' => 'edit'])

          <tr class="text-nowrap">
            <td class="align-middle font-weight-bold" width="300"> {{ __('system.label.active') }} </td>
            <td class="align-middle">
              @if ( $data->active == 1 ) {{ __('system.label.yes') }}
              @else {{ __('system.label.no') }}
              @endif
            </td>
          </tr>

          @if (!empty($status) && $status == 'true')
          <tr class="text-nowrap">
            <td class="align-middle font-weight-bold"> Status </td>
            <td class="align-middle">
              @if ( $data->status == 1 ) {{ __('system.label.success') }}
              @else {{ __('system.label.pending') }}
              @endif
            </td>
          </tr>
          @endif

          <tr class="text-nowrap">
            <td class="align-middle font-weight-bold"> {{ __('system.label.created_by') }} </td>
            <td class="align-middle">
              @if ($data->created_by == 0 || $data->created_by == NULL)
              - System -
              @else
              {{ \DB::table('users')->where('id', $data->created_by)->first()->name }}
              @endif
            </td>
          </tr>
          <tr class="text-nowrap">
            <td class="align-middle font-weight-bold"> {{ __('system.label.updated_by') }} </td>
            <td class="align-middle">
              @if ($data->updated_by == 0 || $data->updated_by == NULL)
              - System -
              @else
              {{ \DB::table('users')->where('id', $data->updated_by)->first()->name }}
              @endif
            </td>
          </tr>
          <tr class="text-nowrap">
            <td class="align-middle font-weight-bold"> {{ __('system.label.created_at') }} </td>
            <td class="align-middle"> {!! \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') !!} </td>
          </tr>
          <tr class="text-nowrap">
            <td class="align-middle font-weight-bold" width="200px"> {{ __('system.label.updated_at') }} </td>
            <td class="align-middle"> {!! \Carbon\Carbon::parse($data->updated_at)->format('d F Y, H:i') !!} </td>
          </tr>
        </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary font-weight-bolder" data-dismiss="modal"> {{ __('system.label.close') }} </button>
      </div>
    </div>
  </div>
</div>
@endpush

@push('js')
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js?v=7.0.6"></script>
<script src="/assets/backend/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
@endpush
