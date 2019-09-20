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
    {{-- admin lte --}}
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/AdminLTE.css') }}">
    {{-- skin admin lte --}}
    <link rel="stylesheet" href="{{ asset('admin-lte/dist/css/skins/_all-skins.min.css') }}">
    {{-- iCHeck --}}
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/iCheck/square/blue.css') }}">
    {{-- font awesome --}}
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    {{-- ionic icon --}}
    <link rel="stylesheet" href="{{ asset('plugins/Ionicons/css/ionicons.min.css') }}">
    {{-- jquery confirm --}}
    <link rel="stylesheet" href="{{ asset('plugins/jquery-confirm/dist/jquery-confirm.min.css') }}">
    {{-- sweet alert --}}
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert/sweetalert.css') }}">
    @stack('css')
</head>
<body class="hold-transition login-page">
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- jquery --}}
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    {{-- jquery-confirm --}}
    <script src="{{ asset('plugins/jquery-confirm/dist/jquery-confirm.min.js') }}"></script>
    {{-- bootstrap --}}
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    {{-- adminLTE --}}
    <script src="{{ asset('admin-lte/dist/js/adminlte.min.js') }}"></script>
    {{-- icheck --}}
    <script src="{{ asset('admin-lte/plugins/iCheck/icheck.min.js') }}"></script>
    {{-- sweet alert --}}
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
