{!! Form::open(['url' => $url,'class' => 'form-horizontal', 'method' => 'post']) !!}
	<div class="box-body">

		@include('flash::message')
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

		{!! Form::token() !!}
		{!! Form::newText([2,4],'Menu Name','name',$data->name,['required']) !!}
		{!! Form::newText([2,6],'URL','url',$data->url,['required']) !!}
		{!! Form::newOption([2,4],'Parent','parent',$data->parent,['required'],$parents) !!}
		{!! Form::newAppend([2,2],'Icon Font Awesome','icon',$data->icon,['required'],'fa fa-','start') !!}

		{{-- group permission --}}
	    <hr>
	    @foreach($group as $row)
	      @php
	        $checked = false;
	        if($groupMenu){
	          foreach($groupMenu as $rs)
	          {
	            if($rs->group == $row->id){
	              $checked = true;
	            }
	          }
	        }
	      @endphp
	      {!! Form::newCheckbox([2,6],$row->name,'group[]',$row->id,$checked,[]) !!}
	    @endforeach

	</div>
	{!! Form::newSubmit([2,6],'Submit','Cancel') !!}
{!! Form::close() !!}