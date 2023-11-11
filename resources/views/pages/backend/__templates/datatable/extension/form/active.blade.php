@if (empty($active) || $active == 'true')
<div class="form-group row">
  <div class="col-lg-3 col-form-label"> {{ __('default.label.active') }} </div>
  <div class="col-lg-9">
    {{ Html::select('active', ['1' => __('default.label.yes'), '0' => __('default.label.no')], (isset($data->active) ? $data->active : '1'))->class($errors->has('active') ? 'form-control is-invalid' : 'form-control')->required() }}
    @error('active') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
  </div>
</div>
@endif
