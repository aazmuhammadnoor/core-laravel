<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
  	<div class="input-group">
      @if($position == 'start')
      	<div class="input-group-addon">
	        {!!$icon!!}
	      </div>
      @endif
      {{ Form::text($name, $value, array_merge(['class' => 'form-control'], (is_array($attributes)) ? $attributes : [])) }}
      @if($position == 'end')
      	<div class="input-group-addon">
	        {!!$icon!!}
	      </div>
      @endif
    </div>
  </div>
</div>
