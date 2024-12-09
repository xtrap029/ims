<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('upload/favicon.png')}}">
    <title>Assets Management System</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('plugin/datatables2/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    
    <!-- Script -->
    <script src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
    
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>


</head>

<body style="
    background-image: url('/images/scan.jpg');">
    @yield('content')
</body>

</html>