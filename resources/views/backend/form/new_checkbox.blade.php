<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
    {{ Form::checkbox($name,$value,$boolean,array_merge(['class' => 'form-check-input'], (is_array($attributes)) ? $attributes : [])) }}
  </div>
</div>
