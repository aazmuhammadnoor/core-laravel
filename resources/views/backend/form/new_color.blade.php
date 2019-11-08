<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
  	<div class="input-group my-colorpicker1">
      {{ Form::text($name, $value, array_merge(['class' => 'form-control my-colorpicker1'], (is_array($attributes)) ? $attributes : [])) }}
      <div class="input-group-addon">
      </div>
    </div>
  </div>
</div>
