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
		{!! Form::open(['url' => '','class' => 'form-horizontal', 'method' => 'get']) !!}
			<div class="box-body">

				@include('flash::message')
		        @if ($errors->any())
		          <div class="alert alert-danger">
		              <ul class="list-group">
		                  @foreach ($errors->all() as $error)
		                      <li class="list-group-item">{{ $error }}</li>
		                  @endforeach
		              </ul>
		          </div>
		        @endif

				{!! Form::token() !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newText([2,6],'Text Input','text','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newPassword([2,6],'Password','password','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newEmail([2,6],'E-mail','email','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newTextarea([2,6],'Textarea','textarea','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[],$option[] --}}
				{!! Form::newOption([2,6],'Select Option','option_name','2',['required'],[1=>"One",2=>"Two",3=>"Three"]) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newFile([2,6],'File Upload','file','','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$boolean[true/false],$attribute[] --}}
				{!! Form::newCheckbox([2,6],'Checkbox','checkbox','',true,['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[],$option[] --}}
				{!! Form::newRadio([2,6],'Radio Option','radio','1',['required'],[1=>"One",2=>"Two",3=>"Three"]) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newDateMask([2,6],'Date Mask Input','date','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newDatePicker([2,6],'Date Picker','date','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newDateRangePicker([2,6],'Date Range Picker','date','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newDateTimeRangePicker([2,6],'Date Range Time Picker','date','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newDateTimeBtn([2,6],'Date Range Button','date','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[],$icon,$position('start/end') --}}
				{!! Form::newAppend([2,6],'Text Append','append','',['required'],'<i class="fa fa-user"></i>','end') !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newColor([2,6],'Color Picker','color','',['required']) !!}

				{{-- @param $width(['left','right'],$label,$name,$value,$attribute[] --}}
				{!! Form::newTime([2,6],'Time Picker','time','',['required']) !!}

				{{-- 
					/**
					 * to use, add this script on your javascript page
					 * change [name] to name
					 */

    				<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

					CKEDITOR.replace('[name]')

					/**
					 *
					 */
					@param $width(['left','right'],$label,$name,$value
				 --}}
				{!! Form::newEditor([2,10],'Document','editor1','') !!}
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
	    $("#template").addClass('active');
	    $("#form").addClass('active');
		CKEDITOR.replace('editor1')
	</script>
@endpush
