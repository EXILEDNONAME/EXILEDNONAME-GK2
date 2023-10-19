<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Date </div>
  <div class="col-lg-9">
    <div class="input-group input-group-solid date" id="ex_datetimepicker_date_start" data-target-input="nearest">
      <input name="date" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select Date -" data-target="#ex_datetimepicker_date_start" value="{{ isset($data->date) ? $data->date : '' }}" autocomplete="off" required>
      <div class="input-group-append" data-target="#ex_datetimepicker_date_start" data-toggle="datetimepicker">
        <span class="input-group-text"><i class="ki ki-calendar"></i></span>
      </div>
    </div>
  </div>
</div>

<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Date </div>
  <div class="col-lg-9">
    <input type="text" id="ex_datepicker_multi" placeholder="Choose Date" style="cursor: pointer;" class="form-control form-control-solid">
  </div>
</div>



<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Event </div>
  <div class="col-lg-9">
    {{ Html::select('event', ['ICF' => "ICF", 'CHALLENGE' => "CHALLENGE"], (isset($data->event) ? $data->event : NULL))->placeholder(' - Select Event -')->class($errors->has('event') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('event') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Content </label>
  <div class="col-lg-9">
    {{ Html::text('content', (isset($data->content) ? $data->content : ''))->class([ $errors->has('content') ? 'form-control is-invalid' : 'form-control']) }}
    @error('content') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Name </label>
  <div class="col-lg-9">
    {{ Html::text('name', (isset($data->name) ? $data->name : Auth::User()->name))->class([ $errors->has('name') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid'])->isReadonly() }}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> ID </label>
  <div class="col-lg-9">
    {{ Html::text('id_bigo', (isset($data->id_bigo) ? $data->id_bigo : Auth::User()->username))->class([ $errors->has('id_bigo') ? 'form-control form-control-solid is-invalid' : 'form-control form-control-solid'])->isReadonly() }}
    @error('id_bigo') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
