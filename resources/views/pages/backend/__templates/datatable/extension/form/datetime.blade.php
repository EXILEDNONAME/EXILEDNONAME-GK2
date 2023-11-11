@if (!empty($datetime) && $datetime == 'true')
<div class="form-group row">
  <label class="col-lg-3 col-form-label"> {{ __('default.label.date-start') }} </label>
  <div class="col-lg-9">
    <div class="input-group input-group-solid date" id="ex_datetimepicker_date_start" data-target-input="nearest">
      <input name="date_start" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select {{ __('default.label.date-start') }} -" data-target="#ex_datetimepicker_date_start" value="{{ isset($data->date_start) ? $data->date_start : '' }}">
      <div class="input-group-append" data-target="#ex_datetimepicker_date_start" data-toggle="datetimepicker">
        <span class="input-group-text"><i class="ki ki-calendar"></i></span>
      </div>
    </div>
  </div>
</div>
<div class="form-group row">
  <label class="col-lg-3 col-form-label"> {{ __('default.label.date-end') }} </label>
  <div class="col-lg-9">
    <div class="input-group input-group-solid date" id="ex_datetimepicker_date_end" data-target-input="nearest">
      <input name="date_end" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select {{ __('default.label.date-end') }} -" data-target="#ex_datetimepicker_date_end" value="{{ isset($data->date_end) ? $data->date_end : '' }}">
      <div class="input-group-append" data-target="#ex_datetimepicker_date_end" data-toggle="datetimepicker">
        <span class="input-group-text"><i class="ki ki-calendar"></i></span>
      </div>
    </div>
  </div>
</div>
@endif
