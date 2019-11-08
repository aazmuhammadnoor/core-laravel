<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
	<textarea id="{{$name}}" name="{{$name}}" rows="10" cols="80" class="form-control">{{ $value }}</textarea>
  </div>
</div>
