<div class="form-group row">
  <label class="col-lg-3 col-form-label">
    <a href="/dashboard/applications/tables/generals" target="_blank" class="text-danger font-weight-bold"><u> General </u></a>
  </label>
  <div class="col-lg-9">
    {{ Html::select('id_table_general', application_table_generals(), (isset($data->id_table_general) ? $data->id_table_general : NULL))->placeholder('- Select Table General')->class('form-control')->required() }}
    @error('id_table_general') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
