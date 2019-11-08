<div class="form-group">
  {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
  <div class="col-sm-{{$width[1]}}">
  	@if(!is_null($value) && $value!='')
      	@if(\Illuminate\Support\Str::contains($value,['jpg','png','jpeg','bmp','gif','tiff']))
	      	<div class="card m-b-10">
	      		<img class="img-thumbnail img-fluid" src="{{$value}}">
	      	</div>
      	@else
      		<a href="{{$download}}" class="btn btn-primary btn-sm m-b-10" target="_blank"><i class="fa fa-download"></i> Download</a>
      	@endif
    @endif
    {!! Form::file($name, $attributes = array()); !!}
  </div>
</div>