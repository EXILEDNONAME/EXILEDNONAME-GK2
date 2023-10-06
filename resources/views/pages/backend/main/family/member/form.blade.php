<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Verified </div>
  <div class="col-lg-9">
    {{ Html::select('verify', ['1' => __('system.label.yes'), '0' => __('system.label.no')], (isset($data->verify) ? $data->verify : NULL))->placeholder('- Select Status Verify -')->class($errors->has('verify') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('verify') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
  </div>
</div>

<div class="form-group row">
  <div class="col-lg-3 col-form-label"> Official Host </div>
  <div class="col-lg-9">
    {{ Html::select('official', ['1' => __('system.label.yes'), '0' => __('system.label.no')], (isset($data->official) ? $data->verify : NULL))->placeholder('- Select Status Official Host -')->class($errors->has('official') ? 'form-control is-invalid' : 'form-control')->required() }}
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
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
