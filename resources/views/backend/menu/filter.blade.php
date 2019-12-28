{!! Form::open(['url' => url()->current(),'class' => 'form-horizontal', 'method' => 'post']) !!}
  {!! Form::newText([3,6],'Menu Name','name',$r->name,['']) !!}
  {!! Form::newText([3,6],'URL','Url',$r->url,['']) !!}
  {!! Form::newOption([3,6],'Parent','parent',$r->parent,['required'],$parents) !!}
  {!! Form::newOption([3,6],'Limit','limit',$r->limit,[''],limit_page()) !!}
  {!! Form::newSubmit([3,6],'Submit','Cancel') !!}
{!! Form::close() !!}