<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Name </label>
  <div class="col-lg-9">
    {!! Form::text('name', (isset($data->name) ? $data->name : ''), ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> ID Bigo </label>
  <div class="col-lg-9">
    {!! Form::text('id_bigo', (isset($data->id_bigo) ? $data->id_bigo : ''), ['class' => $errors->has('id_bigo') ? 'form-control is-invalid' : 'form-control', 'required' => 'required']) !!}
    @error('id_bigo') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {!! Form::textarea('description', (isset($data->description) ? $data->description : ''), ['id' => 'ex-textarea', 'class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control']) !!}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
