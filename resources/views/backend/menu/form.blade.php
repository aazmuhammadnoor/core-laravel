@extends('layouts.layout')

@push('css')
@endpush

@section('content')
<section class="content-header">
  <h1>
    {{$title}}
    <small>{{$sub_title}}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/backend') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    @foreach($breadcrumb as $key => $sub)
    	<li {{ ($key == end($breadcrumb)) ? 'class="active' : '' }}>
    		<a href="{{ $sub['url'] }}">{{ $sub['name'] }}</a>
    	</li>
    @endforeach
  </ol>
</section>
<section class="content">
  <div class="row">
	<div class="col-md-12">
	  <div class="box box-info">
	    <div class="box-header with-border">
	      <h3 class="box-title">{{$title}}</h3>
	    </div>
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
				{!! Form::newOption([2,4],'Parent','option_name',$data->parent,['required'],$parents) !!}
				{!! Form::newAppend([2,2],'Icon Font Awesome','icon',$data->icon,['required'],'fa fa-','start') !!}

			</div>
			{!! Form::newSubmit([2,6],'Submit','Cancel') !!}
		{!! Form::close() !!}
	  </div>
	</div>
  </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
	<script>
	    $("#master").addClass('active');
	    $("#master-menu").addClass('active');
	</script>
@endpush
