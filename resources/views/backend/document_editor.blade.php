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
		{!! Form::open(['url' => 'foo/bar','class' => 'form-horizontal', 'method' => 'push']) !!}
			<div class="box-body">
				{{-- 
					/**
					 * to use, add this script on your javascript page
					 * change [name] to label name
					 */
					<script src="{{ asset('plugins/ckeditor5/ckeditor.js') }}"></script>

					DecoupledEditor
						.create( document.querySelector( '#[name]' ), {
							// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
					})
					.then([name] => {
						const toolbarContainer = document.querySelector( 'main .toolbar-container' );
						toolbarContainer.prepend( [name].ui.view.toolbar.element );
						window.[name] = [name];
					})
					.catch(err => {
						console.error( err.stack );
					});

					/**
					 *
					 */

					@param $width(['left','right'],$label,$name,$value
				 --}}
				{!! Form::newDocument([2,10],'Document','edit','') !!}
			</div>
			{!! Form::newSubmit([12,0],'Submit','Cancel') !!}
		{!! Form::close() !!}
	  </div>
	</div>
  </div>
</section>
@endsection

@push('scripts')
	<script src="{{ asset('plugins/ckeditor5/ckeditor.js') }}"></script>
	<script>
		DecoupledEditor
		.create( document.querySelector( '.edit' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
			cloudServices: {
	            uploadUrl: '{{ url('storage/image-editor') }}'
	        }
		})
		.then( edit => {
			const toolbarContainer = document.querySelector( 'main .toolbar-container' );

			toolbarContainer.prepend( edit.ui.view.toolbar.element );

			window.edit = edit;
		})
		.catch( err => {
			console.error( err.stack );
		});

		$(document).on("keyup click change",".edit , .ck",function(e){
		  console.log($(".edit").html());
		});
	</script>
@endpush
