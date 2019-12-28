{!! Form::open(['url' => url()->current(),'class' => 'form-horizontal', 'method' => 'post']) !!}
  {!! Form::newText([3,6],'Username','username',$r->username,['']) !!}
  {!! Form::newText([3,6],'Email','email',$r->email,['']) !!}
  {!! Form::newOption([3,6],'Group','group',$r->group,[''],$group) !!}
  {!! Form::newOption([3,6],'Limit','limit',$r->limit,[''],limit_page()) !!}
  {!! Form::newSubmit([3,6],'Submit','Cancel') !!}
{!! Form::close() !!}