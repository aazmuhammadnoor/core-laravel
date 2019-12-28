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
          @include("backend.$folder.filter")
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
          @include("backend.$folder.show")
        </div>
      </div>
    </div>

    {{-- button --}}
    <div class="col-md-3">
      @include("backend.$folder.button")
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

          @include("backend.$folder.table")

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
  @include("backend.$folder.script_form")
@endpush
