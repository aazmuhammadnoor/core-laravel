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
          {!! Form::open(['url' => url()->current(),'class' => 'form-horizontal', 'method' => 'post']) !!}
              {!! Form::newText([3,6],'Menu Name','name',$r->name,['']) !!}
              {!! Form::newText([3,6],'URL','Url',$r->url,['']) !!}
              {!! Form::newOption([3,6],'Parent','parent',$r->parent,['required'],$parents) !!}
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
          {!! Form::newCheckbox([8,4],'Menu Name','name','',true,['required','data-form'=>'table_row']) !!}
          {!! Form::newCheckbox([8,4],'Url','url','',true,['required','data-form'=>'table_row']) !!}
          {!! Form::newCheckbox([8,4],'Parent','parent','',true,['required','data-form'=>'table_row']) !!}
          {!! Form::newCheckbox([8,4],'Icon','icon','',true,['required','data-form'=>'table_row']) !!}
          {!! Form::newCheckbox([8,4],'Action','action','',false,['required','data-form'=>'table_row']) !!}
        </div>
      </div>
    </div>

    {{-- button --}}
    <div class="col-md-3">
      <a href="{{ url("backend/menu/add") }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> New</a>
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
                  <th class="url">URL</th>
                  <th class="parent">Parent</th>
                  <th class="icon">Icon</th>
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
                    <td class="url">{{ $row->url }}</td>
                    <td class="parent">{{ $row->parent }}</td>
                    <td class="icon">{{ $row->icon }}</td>
                    <td class="action">
                      <a href="{{ route('backend.menu.edit',[$row->id]) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
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
    $("#master").addClass('active');
    $("#master-menu").addClass('active');
  </script>
@endpush
