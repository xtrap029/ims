@extends('main')
@section('content')

<section class="">
    <div class="content p-4">
       
       
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card background-blue color-white">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img width="42"
                                src="<?php echo asset('images/icon-asset.png')?>" />
                                </div>
                            </div>
                            <div class="col-xs-7 home-detail" >
                                <div class="numbers">
                                    <p><?php echo trans('lang.totalasset');?></p>
                                    <span class="totalhead totalasset"></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-angle-double-right color-white"></i> <span class="color-white"><a class="color-white" href="{{ url('assetlist') }}"><?php echo trans('lang.moreinfo');?></a> <span></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card background-yellow color-white">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img width="42"
                                src="<?php echo asset('images/icon-component.png')?>" />
                                </div>
                            </div>
                            <div class="col-xs-7 home-detail" >
                                <div class="numbers">
                                    <p><?php echo trans('lang.totalcomponent');?></p>
                                    <span class="totalhead totalcomponent"></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-angle-double-right color-white"></i> <span class="color-white"><a class="color-white" href="{{ url('componentlist') }}"><?php echo trans('lang.moreinfo');?></a> <span></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card background-green color-white">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img width="42"
                                src="<?php echo asset('images/icon-maintenance.png')?>" />
                                </div>
                            </div>
                            <div class="col-xs-7 home-detail" >
                                <div class="numbers">
                                    <p><?php echo trans('lang.totalmaintenance');?></p>
                                    <span class="totalhead totalmaintenance"></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-angle-double-right color-white"></i> <span class="color-white"><a class="color-white" href="{{ url('maintenancelist') }}"><?php echo trans('lang.moreinfo');?></a> <span></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-sm-6">
                <div class="card background-red color-white">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img width="42"
                                src="<?php echo asset('images/icon-employee.png')?>" />
                                </div>
                            </div>
                            <div class="col-xs-7 home-detail" >
                                <div class="numbers">
                                    <p><?php echo trans('lang.totalemployees');?></p>
                                    <span class="totalhead totalemployee"></span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-angle-double-right color-white"></i> <span class="color-white"><a class="color-white" href="{{ url('employeeslist') }}"><?php echo trans('lang.moreinfo');?></a> <span></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="header">
                        <h5 class="title text-center"><?php echo trans('lang.assetbytype');?><h5>
                    </div>
                    <div class="content">
                         <canvas id="assetbytype" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="header">
                        <h5 class="title text-center"><?php echo trans('lang.assetbystatus');?><h5>
                    </div>
                    <div class="content">
                         <canvas id="assetbystatus" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h5 class="title text-center"><?php echo trans('lang.recentassetactivity');?><h5>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                             <table id="recentassetactivity" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.asset');?></th>
                                        <th><?php echo trans('lang.employee');?></th>
                                        <th><?php echo trans('lang.status');?></th>
                                        <th><?php echo trans('lang.location');?></th>
                                        <th><?php echo trans('lang.date');?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.asset');?></th>
                                        <th><?php echo trans('lang.employee');?></th>
                                        <th><?php echo trans('lang.status');?></th>
                                        <th><?php echo trans('lang.location');?></th>
                                        <th><?php echo trans('lang.date');?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h5 class="title text-center"><?php echo trans('lang.recentcomponentactivity');?><h5>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive">
                             <table id="recentcomponentactivity" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.component');?></th>
                                        <th><?php echo trans('lang.asset');?></th>
                                        <th><?php echo trans('lang.quantity');?></th>
                                        <th><?php echo trans('lang.status');?></th>
                                        <th><?php echo trans('lang.location');?></th>
                                        <th><?php echo trans('lang.date');?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.component');?></th>
                                        <th><?php echo trans('lang.asset');?></th>
                                        <th><?php echo trans('lang.quantity');?></th>
                                        <th><?php echo trans('lang.status');?></th>
                                        <th><?php echo trans('lang.location');?></th>
                                        <th><?php echo trans('lang.date');?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<script>
$(document).ready(function() {
    $('#recentassetactivity').DataTable({
       
        bFilter:false,
        paging: false,
        bInfo: false ,
        ajax: "{{ url('home/recentassetactivity')}}",
        
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },
            {
                data: 'asset'
            },
            {
                data: 'employees'
            },
            {
                data: 'status'
            },
            {
                data: 'location'
            },
            {
                data: 'date'
            }
        ],
        dom: 'lfrtip',
    });

    $('#recentcomponentactivity').DataTable({
       
        bFilter:false,
        paging: false,
        bInfo: false ,
        ajax: "{{ url('home/recentcomponentactivity')}}",
        
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },
            {
                data: 'component'
            },
            {
                data: 'asset'
            },
            {
                data: 'quantity'
            },
            {
                data: 'status'
            },
            {
                data: 'location'
            },
            {
                data: 'date'
            }
        ],
        dom: 'lfrtip',
    });

    
    //asset by type
    $.ajax({
        type: "GET",
        url: "{{ url('home/assetbytype')}}",
        dataType: "json",
        success: function (data) {
            var type = [];
            var amount = [];
            var color = [];

                var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
             };

            for(var i in data) {
                type.push(data[i].type);
                amount.push(data[i].amount);
                color.push(dynamicColors());
                
            }
            
            var databytype = document.getElementById("assetbytype");
            var bytype = new Chart(databytype, {
                type: 'doughnut',
                legendPosition: 'bottom',
                data: {
                    labels: type,
                    datasets: [
                    {
                        label: "<?php echo trans('lang.type');?>",
                        data: amount,
                        backgroundColor: color,
                        borderWidth: 1
                    }
                    ]
                },
                options: {
                    legend: {
                           position: 'bottom',
                    },
                    
                }
            });
        }
    });

    //asset by status
    $.ajax({
        type: "GET",
        url: "{{ url('home/assetbystatus')}}",
        dataType: "json",
        success: function (data) {
            var status = [];
            var amount = [];
            var color = [];
            var statusdata = [];

            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
            };

            for(var i in data) {
                status.push(data[i].status);
                amount.push(data[i].amount);
                color.push(dynamicColors());
            }
            
            var databystatus = document.getElementById("assetbystatus");
            var bystatus = new Chart(databystatus, {
                type: 'doughnut',
                legendPosition: 'bottom',
                data: {
                    labels: status,
                    datasets: [
                    {
                        label: "<?php echo trans('lang.status');?>",
                        data: amount,
                        backgroundColor: color,
                        borderWidth: 1
                    }
                    ]
                },
                options: {
                    legend: {
                           position: 'bottom',
                    },
                    
                }
            });
        }
    }); 

});



//get total balance
//generate product code
$.ajax({
        type: "GET",
        url: "{{ url('home/totalbalance')}}",
        dataType: "JSON",
        success: function(html) {
            $(".totalasset").html(html.totalasset || 0);
            $(".totalcomponent").html(html.totalcomponent || 0);
            $(".totalemployee").html(html.totalemployee || 0);
            $(".totalmaintenance").html(html.totalmaintenance || 0);
        }   
    }); 


  

</script>
@endsection