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
    <script src="{{ asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('plugin/chart/moment.min.js')}}"></script>
    <script src="{{ asset('plugin/chart/Chart.min.js')}}"></script>
    <script src="{{ asset('plugin/chart/utils.js')}}"></script>
    <script src="{{ asset ('plugin/jqueryvalidation/jquery.validate.js')}}"></script>
    <script src="{{ asset('plugin/jqueryvalidation/additional-methods.js')}}"></script>
    <script src="{{ asset('plugin/datatables2/datatables.min.js')}}"></script>
    <script src="{{ asset('js/general.js')}}"></script>


</head>

<body>
    <div class="main-panel">
        @yield('content')
        <footer class="footer border-0">
            <div class="container-fluid">

                <div class="copyright pull-right">
                    Copyright © 2024 IMS. All rights reserved.</a>
                </div>
            </div>
        </footer>
    </div>

    <script>
    (function($) { 
    "use strict";

            //get height of the main container
            setTimeout(function() { 
                $('.sidebar .sidebar-wrapper').css('height', $('.main-panel').outerHeight()+'px');
            }, 2500);

            
            //get app setting
            $.ajax({
                type: "GET",
                url: "{{ url('settings')}}",
                dataType: "JSON",
                success: function(data) {
                    $("#id").val('1');
                    $(".company").html(data.data.company);
                    $(".setcurrency").html(data.data.currency);
                    $(".logoimg").attr("src", data.logo);
                }
            });
            //datepicker
            $('.setdate').datepicker({
                autoclose: true,
                dateFormat: "yy-mm-dd",
                todayHighlight: true
            }); 

    })(jQuery);
    </script>

</body>

</html>