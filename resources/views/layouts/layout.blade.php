<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! config('app.name', 'Laravel') !!}</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- css plugin - select2 --}}
    <link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
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

    @stack('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.part.navigation')
        @include('layouts.part.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>
        
        @include('layouts.part.footer')
    </div>
    {{-- jquery --}}
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    {{-- jquery-confirm --}}
    <script src="{{ asset('plugins/jquery-confirm/dist/jquery-confirm.min.js') }}"></script>
    {{-- bootstrap --}}
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    {{-- adminLTE --}}
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    {{-- sweet alert --}}
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    {{-- slim scroll --}}
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    {{-- fast click --}}
    <script src="{{ asset('plugins/fastclick/lib/fastclick.js') }}"></script>
    {{-- jquery ui --}}
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    {{-- select2 --}}
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
          $('.sidebar-menu').tree()
        })
        $('.select2').select2()
    </script>
    @stack('scripts')
</body>
</html>
