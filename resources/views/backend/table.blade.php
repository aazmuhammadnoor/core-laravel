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

    {{-- filter --}}
    <div class="col-md-6">
      <div class="box box-info collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Sortir</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          {!! Form::open(['url' => url()->current(),'class' => 'form-horizontal', 'method' => 'get']) !!}
              {!! Form::newText([3,6],'Name','name',$r->name,['']) !!}
              {!! Form::newText([3,6],'Email','email',$r->email,['']) !!}
              {!! Form::newText([3,6],'Address','address',$r->address,['']) !!}
              {!! Form::newText([3,6],'Phone','phone',$r->phone,['']) !!}
              {!! Form::newOption([3,6],'Limit','limit',$r->limit,[''],limit_page()) !!}
              {!! Form::newSubmit([3,6],'Submit','Cancel') !!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>

    {{-- show --}}
    <div class="col-md-3">
      <div class="box box-info collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Show</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          {!! Form::newCheckbox([8,4],'Name','name','',true,['required','data-form'=>'table_row']) !!}
          {!! Form::newCheckbox([8,4],'Email','email','',true,['required','data-form'=>'table_row']) !!}
          {!! Form::newCheckbox([8,4],'Address','address','',true,['required','data-form'=>'table_row']) !!}
          {!! Form::newCheckbox([8,4],'Phone','phone','',true,['required','data-form'=>'table_row']) !!}
          {!! Form::newCheckbox([8,4],'Action','action','',false,['required','data-form'=>'table_row']) !!}
        </div>
      </div>
    </div>

    {{-- button --}}
    <div class="col-md-3">
      <a href="#!" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> New</a>
    </div>

  </div>

  <div class="row">
  	<div class="col-md-12">
  	  <div class="box box-info">
  	    <div class="box-header with-border">
  	      <h3 class="box-title">{{$title}}</h3>
  	    </div>
  	    <div class="box-body table-responsive">
          
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

  	    	<table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="no">No</th>
                  <th class="name">Name</th>
                  <th class="email">Email</th>
                  <th class="address">Address</th>
                  <th class="phone">Phone</th>
                  <th class="action">Action</th>
                </tr>
              </thead>
              <tbody>
                @php 
                  $no = ($data->currentPage()-1)*$data->perPage() 
                @endphp

                @foreach($data as $row)
                  @php $no ++ @endphp
                  <tr>
                    <td class="no">{{ $no }}</td>
                    <td class="name">{{ $row->name }}</td>
                    <td class="email">{{ $row->email }}</td>
                    <td class="address">{{ $row->address }}</td>
                    <td class="phone">{{ $row->phone }}</td>
                    <td class="action">
                      <a href="#!" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                      <a href="#!" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
          </table>
          <div class="text-center">
            {{ $data->appends($r->all())->links() }}
          </div>
  	    </div>
  	  </div>
  	</div>
  </div>
</section>
@endsection

@push('scripts')
  <script src="{{ asset('plugins/datatables.net/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables.net/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables.net/js/jszip.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables.net/js/pdfmake.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables.net/js/vfs_fonts.js') }}"></script>
  <script src="{{ asset('plugins/datatables.net/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables.net/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('scripts/table/lists.js') }}"></script>
	<script type="text/javascript">
    
	</script>
@endpush
