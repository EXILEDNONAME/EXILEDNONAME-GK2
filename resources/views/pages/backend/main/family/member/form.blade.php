<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Date Join </div>
  <div class="col-lg-9">
    <div class="input-group input-group-solid date" id="ex_datetimepicker_date_start" data-target-input="nearest">
      <input name="date_join" type="text" class="form-control form-control-solid datetimepicker-input" placeholder="- Select Date -" data-target="#ex_datetimepicker_date_start" value="{{ isset($data->date_join) ? $data->date_join : '' }}" autocomplete="off">
      <div class="input-group-append" data-target="#ex_datetimepicker_date_start" data-toggle="datetimepicker">
        <span class="input-group-text"><i class="ki ki-calendar"></i></span>
      </div>
    </div>
  </div>
</div>

<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Verified </div>
  <div class="col-lg-9">
    {{ Html::select('verify', ['1' => __('system.label.yes'), '0' => __('system.label.no')], (isset($data->verify) ? $data->verify : '1'))->placeholder('- Select Status Verify -')->class($errors->has('verify') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('verify') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
  </div>
</div>

<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Official Host </div>
  <div class="col-lg-9">
    {{ Html::select('official', ['1' => __('system.label.yes'), '0' => __('system.label.no')], (isset($data->official) ? $data->official : NULL))->placeholder('- Select Status Official Host -')->class($errors->has('official') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('official') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> ID Bigo </label>
  <div class="col-lg-9">
    {{ Html::text('id_bigo', (isset($data->id_bigo) ? $data->id_bigo : ''))->class([ $errors->has('id_bigo') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('id_bigo') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Name </label>
  <div class="col-lg-9">
    {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class([ $errors->has('name') ? 'form-control is-invalid' : 'form-control'])->required() }}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Email </label>
  <div class="col-lg-9">
    {{ Html::email('email', (isset($data->email) ? $data->email : ''))->class([ $errors->has('email') ? 'form-control is-invalid' : 'form-control']) }}
    @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Phone </label>
  <div class="col-lg-9">
    {{ Html::number('phone', (isset($data->phone) ? $data->phone : ''))->class([ $errors->has('phone') ? 'form-control is-invalid' : 'form-control']) }}
    @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Area </label>
  <div class="col-lg-9">
    {{ Html::text('area', (isset($data->area) ? $data->area : ''))->class([ $errors->has('area') ? 'form-control is-invalid' : 'form-control']) }}
    @error('area') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Recommendation </label>
  <div class="col-lg-9">
    {{ Html::text('recommendation', (isset($data->recommendation) ? $data->recommendation : ''))->class([ $errors->has('recommendation') ? 'form-control is-invalid' : 'form-control']) }}
    @error('recommendation') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
