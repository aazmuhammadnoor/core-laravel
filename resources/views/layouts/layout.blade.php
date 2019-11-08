<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! config('app.name', 'Laravel') !!} - {{ $title }}</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- css plugin - select2 --}}
    <link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    {{-- css plugin - datatables --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    {{-- admin lte --}}
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/AdminLTE.css') }}">
    {{-- skin admin lte --}}
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/skins/_all-skins.min.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    {{-- ionic icon --}}
    <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.min.css') }}">
    {{-- jquery confirm --}}
    <link rel="stylesheet" href="{{ asset('plugins/jquery-confirm/dist/jquery-confirm.min.css') }}">
    {{-- sweet alert --}}
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.css') }}">
    {{-- css plugin - animated css for simple animation --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/animate-css/animate.css') }}">
    {{-- css plugin - spinkit for simple loading --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/spinkit/css/spinkit.css') }}">
    {{-- css plugin - feather icon --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/feathers/src/css/iconfont.css') }}">
    {{-- css plugin - daterange picker --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}">
    {{-- css plugin - datepicker --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    {{-- css plugin - iCheck --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-lte/plugins/iCheck/all.css') }}">
    {{-- css plugin - color picker --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    {{-- css plugin - timepicker --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-lte/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    {{-- css plugin - helper --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/helper.css') }}">
    {{-- css plugin - ckeditor5 --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/ckeditor5/sample/css/sample.css') }}">

    @stack('css')
</head>
<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        @include('layouts.part.navigation')
        @include('layouts.part.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>
        
        @include('layouts.part.footer')
    </div>
    @stack('import-js')
    {{-- jquery --}}
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    {{-- jquery-confirm --}}
    <script src="{{ asset('plugins/jquery-confirm/dist/jquery-confirm.min.js') }}"></script>
    {{-- bootstrap --}}
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    {{-- data tables --}}
    <script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    {{-- adminLTE --}}
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    {{-- date-range-picker --}}
    <script src="{{ asset('plugins/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    {{-- datepicker --}}
    <script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    {{-- color picker --}}
    <script src="{{ asset('plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    {{-- time picker --}}
    <script src="{{ asset('admin-lte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    {{-- iCheck --}}
    <script src="{{ asset('admin-lte/plugins/iCheck/icheck.min.js') }}"></script>
    {{-- sweet alert --}}
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    {{-- slim scroll --}}
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    {{-- fast click --}}
    <script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>
    {{-- jquery ui --}}
    {{-- <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}
    {{-- select2 --}}
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    {{-- InputMask --}}
    <script src="{{ asset('admin-lte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    {{-- init --}}
    <script src="{{ asset('plugins/init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    @stack('scripts')
</body>
</html>
