@if (!empty($status) && $status == 'true')
<div class="form-group row">
  <div class="col-lg-3 col-form-label"> {{ __('default.label.status') }} </div>
  <div class="col-lg-9">
    {{ Html::select('status', ['1' => __('default.label.success'), '2' => __('default.label.pending'), '3' => __('default.label.progress')], (isset($data->status) ? $data->status : NULL))->class($errors->has('status') ? 'form-control is-invalid' : 'form-control')->placeholder('- ' . __('default.select.status') . ' -')->required() }}
    @error('status') {{ Html::span()->text($message)->class('invalid-feedback') }} @enderror
  </div>
</div>
@endif
