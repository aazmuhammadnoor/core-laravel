<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
     {{ Form::select($name,$array,$value,array_merge(['class' => 'form-control select2','style'=>'width: 100%'],(is_array($attributes)) ? $attributes : [])) }}
  </div>
</div>