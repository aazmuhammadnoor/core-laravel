<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
  	@foreach($array as $key => $val)
	    <label>
	    	{{ Form::radio($name, $key,($key == $value) ? true : '',array_merge(['class' => 'minimal'], (is_array($attributes)) ? $attributes : [])) }}
	    </label>
	    <label class="m-r-10">
	    	{{$val}}
	    </label>
	@endforeach
  </div>
</div>
