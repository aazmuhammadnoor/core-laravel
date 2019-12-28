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
		{!! Form::newText([2,4],'Nama Group','name',$data->name,['required']) !!}

	</div>
	{!! Form::newSubmit([2,6],'Submit','Cancel') !!}
{!! Form::close() !!}