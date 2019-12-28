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
		{!! Form::newText([2,4],'Nama Permission','name',$data->name,['required']) !!}
    {{-- group permission --}}
    <hr>
    @foreach($group as $row)
      @php
        $checked = false;
        if($groupPermission){
          foreach($groupPermission as $rs)
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