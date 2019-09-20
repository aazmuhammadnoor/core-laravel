<div class="box-body">
    <div class="form-group">
      {{ Form::label($name, $label, ['class' => 'control-label col-sm-'.$width[0]]) }}
      <div class="col-sm-{{$width[1]}}">
         {{ Form::select($name,$array,$value,['class' => 'form-control select2','style'=>'width: 100%']) }}
      </div>
    </div>
</div>