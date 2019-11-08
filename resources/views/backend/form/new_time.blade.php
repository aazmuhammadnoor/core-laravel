<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
  	<div class="input-group">
      <div class="input-group-addon">
      	<i class="fa fa-clock-o"></i>
      </div>
      {{ Form::text($name, $value, array_merge(['class' => 'form-control timepicker'], (is_array($attributes)) ? $attributes : [])) }}
    </div>
  </div>
</div>
