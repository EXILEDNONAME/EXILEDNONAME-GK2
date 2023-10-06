<div class="form-group row">
  <label class="col-lg-3 col-form-label">
    <a href="/dashboard/settings/management/accesses/create" target="_blank" class="text-danger font-weight-bold"><u> Access </u></a>
  </label>
  <div class="col-lg-9">
    {{ Html::select('id_access', accesses(), (isset($data->id_access) ? $data->id_access : NULL))->class('form-control')->placeholder('- Select Access -')->required() }}
    @error('id_access') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Name </label>
  <div class="col-lg-9">
    {{ Html::text('name', (isset($data->name) ? $data->name : ''))->class($errors->has('name') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Email </label>
  <div class="col-lg-9">
    {{ Html::email('email', (isset($data->email) ? $data->email : ''))->class($errors->has('email') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Phone </label>
  <div class="col-lg-9">
    {{ Html::number('phone', (isset($data->phone) ? $data->phone : ''))->class($errors->has('phone') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Username </label>
  <div class="col-lg-9">
    {{ Html::text('username', (isset($data->username) ? $data->username : ''))->class($errors->has('username') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('username') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>

@if( $formMode == 'create')
<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Password </label>
  <div class="col-lg-9">
    {{ Html::password('password')->class($errors->has('password') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
@endif

<div class="form-group row">
  <label class="col-lg-3 col-form-label"> Description </label>
  <div class="col-lg-9">
    {{ Html::textarea('description', (isset($data->description) ? $data->description : ''))->class([ $errors->has('description') ? 'form-control is-invalid' : 'form-control', ])->id('ex-textarea') }}
    @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
  </div>
</div>
