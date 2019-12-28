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
		{!! Form::newText([2,4],'Username','username',$data->username,['required']) !!}
		{!! Form::newEmail([2,4],'E-mail','email',$data->email,['required']) !!}
		{!! Form::newOption([2,4],'Group','group',$data->group,['required'],$group) !!}
		{!! Form::newPassword([2,4],'Password','password','',[''],'<i class="fa fa-lock"></i>','start') !!}
		{!! Form::newPassword([2,4],'Re-Password','re-password','',[''],'<i class="fa fa-lock"></i>','start') !!}

	</div>
	{!! Form::newSubmit([2,6],'Submit','Cancel') !!}
{!! Form::close() !!}