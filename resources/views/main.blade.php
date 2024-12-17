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

    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div class="logo">
                <h1 class="text-center font-weight-bold" style="color: #0076A8">Inventory</h1>
                {{-- <img class="logoimg" src="" style="width:200px" /> --}}
                <h5 class="text-center">Hi {{ ucwords(Auth::user()->fullname) }}!</h5>
            </div>
            <ul class="nav">

                <li class="{{ Request::is( 'home') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'home') }}">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-dashboard.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.dashboard');?>
                        </p>
                    </a>
                </li>

              
                <li class="{{ Request::is( 'assetlist') || Route::currentRouteName() == 'assetDetail' ? 'active' : '' }}">
                    <a href="{{ URL::to( 'assetlist') }}">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-asset.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.assetmenu');?>
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav mt-5">
                <li class="{{ Request::is( 'componentlist') ? 'active' : '' }} d-none">
                    <a href="{{ URL::to( 'componentlist') }}">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-component.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.componentmenu');?>
                        </p>
                    </a>
                </li>
              
                <li class="{{ Request::is( 'maintenancelist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'maintenancelist') }}">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-maintenance.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.maintenancemenu');?>
                        </p>
                    </a>
                </li>

                <li class="{{ Request::is( 'depreciationlist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'depreciationlist') }}">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-depreciation.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.depreciationmenu');?>
                        </p>
                    </a>
                </li>         

                <li class="{{ Request::is( 'brandlist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'brandlist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-manufacturer.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.brandmenu');?>
                        </p>
                    </a>
                </li>
                
                <li class="{{ Request::is( 'supplierlist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'supplierlist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-supplier.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.suppliermenu');?>
                        </p>
                    </a>
                </li>

                <li class="{{ Request::is( 'locationlist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'locationlist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-location.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.locationmenu');?>
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is( 'previouslyinstalledlist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'previouslyinstalledlist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-location.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.previouslyinstalledmenu');?>
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav mt-5">
                <li class="{{ Request::is( 'employeeslist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'employeeslist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-employee.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.employeemenu');?>
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is( 'departmentlist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'departmentlist') }}">
                        <p><img width="20"
                                src="<?php echo asset('images/icon-department.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.departmentmenu');?>
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav mt-5">
                <li class="{{ Request::is( 'assettypelist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'assettypelist') }}">
                        <p><img width="22"
                                src="<?php echo asset('images/icon-type.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.assettypemenu');?>
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is( 'statuslist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'statuslist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-type.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.statusmenu');?>
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is( 'assetstatuslist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'assetstatuslist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-type.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.assetstatusmenu');?>
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav mt-5">
                <li class="{{ Request::is( 'reports/allreports') || Route::currentRouteName() == 'report' ? 'active' : '' }}">
                    <a href="{{ URL::to( 'reports/allreports') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-report.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.reportmenu');?>
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is( 'userlist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'userlist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-employee.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.usermenu');?>
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is( 'usertypelist') || Route::currentRouteName() == 'usertype' ? 'active' : '' }}">
                    <a href="{{ URL::to( 'usertypelist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-visitor.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.usertypemenu');?>
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is( 'useraccesslist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'useraccesslist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-type.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.useraccessmenu');?>
                        </p>
                    </a>
                </li>
                <li class="{{ Request::is( 'settinglist') ? 'active' : '' }}">
                    <a href="{{ URL::to( 'settinglist') }}">
                        <p><img width="25"
                                src="<?php echo asset('images/icon-setting.png')?>" />&nbsp;&nbsp;&nbsp;<?php echo trans('lang.settingmenu');?>
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-panel">
        <nav class="navbar navbar-expand-lg {{ Route::currentRouteName() == "assetDetail" ? "navbar-dark bg-dark" : "navbar-light bg-light" }} pl-4 pr-4">

           
                <div class="col-md-6 ">
                    <div class="pull-left font-weight-bold d-md-none" style="color: #0076A8; font-size: 30px;">
                        Inventory
                    </div>
                <!-- <a class="navbar-brand company" href="#"></a> -->
                    <button class="navbar-toggler nav-toggler-mobile" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu"
                        aria-expanded="false" aria-label="">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    @if (Route::currentRouteName() == 'assetDetail')
                        <a href="{{ url('assetlist') }}" id="btndetail"  class="sidebar-mini text-white d-none d-md-block">
                            <i class="fa fa-chevron-left w-auto mr-1"></i> Back
                        </a>
                        <div class="d-inline-block mt-1">
                            <a href="{{ url('assetlist') }}" id="btndetail"  class="sidebar-mini text-white d-md-none" style="font-size:  20px;">
                                <i class="fa fa-chevron-left w-auto mr-1"></i>
                            </a>
                        </div>
                    @endif

                </div>
                <div class="col-md-6 ">
                     <!--responsive-->
                        <div class="collapse mt-4" id="menu">
                        <ul class="nav navmobile" >
                            
                            <li class="{{ Request::is( 'home') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'home') }}">
                                        <p><?php echo trans('lang.dashboard');?>
                                        </p>
                                    </a>
                                </li>

                              
                                <li class="{{ Request::is( 'assetlist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'assetlist') }}">
                                        <p><?php echo trans('lang.assetmenu');?>
                                        </p>
                                    </a>
                                </li>
                              
                                <li class="{{ Request::is( 'componentlist') ? 'active' : '' }} d-none">
                                    <a href="{{ URL::to( 'componentlist') }}">
                                        <p><?php echo trans('lang.componentmenu');?>
                                        </p>
                                    </a>
                                </li>
                              
                                <li class="{{ Request::is( 'maintenancelist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'maintenancelist') }}">
                                        <p><?php echo trans('lang.maintenancemenu');?>
                                        </p>
                                    </a>
                                </li>

                                <li class="{{ Request::is( 'depreciationlist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'depreciationlist') }}">
                                        <p><?php echo trans('lang.depreciationmenu');?>
                                        </p>
                                    </a>
                                </li>
                              
                                <li class="{{ Request::is( 'assettypelist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'assettypelist') }}">
                                        <p><?php echo trans('lang.assettypemenu');?>
                                        </p>
                                    </a>
                                </li>
                             
                                <li class="{{ Request::is( 'brandlist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'brandlist') }}">
                                        <p><?php echo trans('lang.brandmenu');?>
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="{{ Request::is( 'supplierlist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'supplierlist') }}">
                                        <p><?php echo trans('lang.suppliermenu');?>
                                        </p>
                                    </a>
                                </li>

                                <li class="{{ Request::is( 'locationlist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'locationlist') }}">
                                        <p><?php echo trans('lang.locationmenu');?>
                                        </p>
                                    </a>
                                </li>
                                <li class="{{ Request::is( 'statuslist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'statuslist') }}">
                                        <p><?php echo trans('lang.statusmenu');?>
                                        </p>
                                    </a>
                                </li>
                                <li class="{{ Request::is( 'employeeslist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'employeeslist') }}">
                                        <p><?php echo trans('lang.employeemenu');?>
                                        </p>
                                    </a>
                                </li>

                                <li class="{{ Request::is( 'departmentlist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'departmentlist') }}">
                                        <p><?php echo trans('lang.departmentmenu');?>
                                        </p>
                                    </a>
                                </li>


                                <li class="{{ Request::is( 'reports/allreports') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'reports/allreports') }}">
                                        <p><?php echo trans('lang.reportmenu');?>
                                        </p>
                                    </a>
                                </li>

                                <li class="{{ Request::is( 'userlist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'userlist') }}">
                                        <p><?php echo trans('lang.usermenu');?>
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="{{ Request::is( 'usermanagement') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'usermanagement') }}">
                                        <p><?php echo trans('lang.usermanagementmenu');?>
                                        </p>
                                    </a>
                                </li>

                                <li class="{{ Request::is( 'settinglist') ? 'active' : '' }}">
                                    <a href="{{ URL::to( 'settinglist') }}">
                                        <p><?php echo trans('lang.settingmenu');?>
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="mt-5">
                                    <a href="{{ URL::to( 'logout') }}">
                                        <p><?php echo trans('lang.logout');?>
                                        </p>
                                    </a>
                                </li>                               
                            </ul>
                            
                    </div>
                        <!--end responsive-->
                    <ul class="topmenu float-md-right float-sm-left d-none d-md-block">
                        <li>
                            <a href="{{ URL::to( 'logout') }}">
                                <span class="sidebar-mini">
                                    <i class="fa fa-sign-out" style="font-size:24px; color: {{ Route::currentRouteName() == 'assetDetail' ? 'white' : 'rgba(0, 0, 0, 0.5)' }};"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>           
        </nav>

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