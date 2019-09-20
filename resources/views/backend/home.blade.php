@extends('layouts.layout')

@push('css')
@endpush

@section('content')
	{!! Form::open(['url' => 'foo/bar','class' => 'form-horizontal', 'method' => 'push']) !!}
		{!! Form::newText([1,6],'nama','nama','','') !!}
		{!! Form::newEmail([1,6],'Email','Email','','') !!}
		{!! Form::newTextarea([1,6],'Email','Email','','') !!}
		{!! Form::newOption([1,6],'Email','','','',[1=>1]) !!}
	{!! Form::close() !!}
@endsection

@push('scripts')
@endpush
