<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
    {{ Form::email($name, $value, array_merge(['class' => 'form-control','placeholder'=>$label], (is_array($attributes)) ? $attributes : [])) }}
  </div>
</div>