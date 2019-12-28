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
		<div class="box-body">
      <div class="row">
          @foreach($dashboard as $row)
          <div class="col-lg-3 col-xs-6">
              <div class="small-box {{ $row['color'] }}">
                <div class="inner">
                  <h3>{{ $row['total'] }}</h3>

                  <p>{{ $row['title'] }}</p>
                </div>
                <div class="icon" style="padding: 16px">
                  <i class="fa {{ $row['icon'] }}"></i>
                </div>
                <a href="{{ $row['url'] }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          @endforeach
        </div>
		</div>
	  </div>
	</div>
  </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
	<script>
    $("#dashboard").addClass('active');
		CKEDITOR.replace('editor1');
	</script>
@endpush
