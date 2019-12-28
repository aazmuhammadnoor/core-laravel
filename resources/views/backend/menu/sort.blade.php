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
      @php
        menu_backend();
      @endphp
		</div>
	  </div>
	</div>
  </div>
</section>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
	<script>
    $("#data-master").addClass('active');
    $("#menu").addClass('active');
    $(document).on('change','.ordering',function(e){
        let id = $(this).data('id');
        let value = $(this).val();
        $.ajax({
          url : '{{ url('backend/menu/sort') }}',
          type : 'post',
          data : {
            id : id,
            value : value,
            _token : '{{ csrf_token() }}'
          },
          beforeSend : function(e){
            $.dialog({
                title: 'Please Wait',
                content: 'Sorting ....',
            });
          },
          success : function(xhr){
            if(xhr){
              $.confirm({
                  title: 'Success',
                  content: 'Sorting done !',
                  buttons: {
                      Ok: function () {
                          window.location.href = '{{ url()->current() }}';
                      }
                  }
              });
            }else{
              $.confirm({
                  title: 'Error',
                  content: 'Sorting failed',
                  buttons: {
                      Ok: function () {
                          window.location.href = '{{ url()->current() }}';
                      }
                  }
              });
            }
          },
          error : function(e){
            $.confirm({
                title: 'Error',
                content: 'Sorting failed',
                buttons: {
                    Ok: function () {
                        window.location.href = '{{ url()->current() }}';
                    }
                }
            });
          }
        })
    })
	</script>
@endpush
