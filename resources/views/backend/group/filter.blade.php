{!! Form::open(['url' => url()->current(),'class' => 'form-horizontal', 'method' => 'post']) !!}
  {!! Form::newText([3,6],'Nama Group','name',$r->name,['']) !!}
  {!! Form::newOption([3,6],'Limit','limit',$r->limit,[''],limit_page()) !!}
  {!! Form::newSubmit([3,6],'Submit','Cancel') !!}
{!! Form::close() !!}