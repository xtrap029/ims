@extends('main')
@section('content')

<section class="">
    <div class="content p-4">
        <div class="row pt-3">
            <div class="col-md-8">
                <h3 class=""><?php echo trans('lang.employeedetail');?></h3>
            </div>
            <div class="col-md-4 text-md-right">
                <a href="{{ url('employeeslist') }}" id="btndetail"  class="btn btn-sm btn-fill btn-warning"><i
                        class="ti-info"></i> <?php echo trans('lang.backtoemployee');?></a>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-9">
                                <input type="hidden" value="{{ $id }}" name="id" id="id" />
                                <p class="title-detail font-bold"> <span class="employeefullname"></span></p>
                                <p class="employeedetail"><span class="employeeemail"></span></p>
                            </div>
                            <div class="col-md-12">
                                <div id="messagesuccess"  class="display-none alert alert-success"><?php echo trans('lang.data_added');?></div>
					            <div id="messagedelete"  class="display-none alert alert-success"><?php echo trans('lang.data_deleted');?></div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details"
                                            role="tab" aria-controls="details"
                                            aria-selected="true"><?php echo trans('lang.details');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="file-tab" data-toggle="tab" href="#file"
                                            role="tab" aria-controls="file"
                                            aria-selected="false"><?php echo trans('lang.file');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="onhand-tab" data-toggle="tab" href="#onhand"
                                            role="tab" aria-controls="onhand"
                                            aria-selected="false"><?php echo trans('lang.onhand');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history"
                                            role="tab" aria-controls="history"
                                            aria-selected="false"><?php echo trans('lang.history');?></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="details" role="tabpanel"
                                        aria-labelledby="details-tab">
                                        <div class="row">
                                            <div class="col-md-9 pt-3">
                                                <table class="table table-hover" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.jobrole');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 employeejobrole"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.department');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 employeedepartmentname"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.city');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 employeecity"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.country');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 employeecountry"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.address');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 employeeaddress"></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="file" role="tabpanel"
                                        aria-labelledby="file-tab">
                                        <div class="text-md-right text-left pt-2">
                                            <button type="button" data-toggle="modal" data-target="#addfile" class="btn btn-sm btn-fill btn-primary"><i class="fa fa-plus"></i> <?php echo trans('lang.add_data');?></button>
                                        </div>
                                        <div class="table-responsive  pt-4">
                                            <table id="datafile" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.name');?></th>
                                                        <th><?php echo trans('lang.file');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.name');?></th>
                                                        <th><?php echo trans('lang.file');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="onhand" role="tabpanel"
                                        aria-labelledby="onhand-tab">
                                        <div class="table-responsive  pt-4">
                                            <table id="dataonhand" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.assetname');?></th>
                                                        <th><?php echo trans('lang.assettag');?></th>
                                                        <th><?php echo trans('lang.serial');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.assetname');?></th>
                                                        <th><?php echo trans('lang.assettag');?></th>
                                                        <th><?php echo trans('lang.serial');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="history" role="tabpanel"
                                        aria-labelledby="history-tab">
                                        <div class="table-responsive  pt-4">
                                            <table id="datahistory" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.assetname');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.assetname');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
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
                </div>
            </div>
        </div>
    </div>

    <!--add new data -->
    <div id="addfile" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" id="formadd">
                    <div class="modal-header">
                       
                        <h5 class="modal-title"><?php echo trans('lang.add_data');?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo trans('lang.name');?></label>
                            <input name="name" type="text" id="name" class=" form-control" required placeholder="<?php echo trans('lang.name');?>"/>
                        </div>
                        
                        <div class="form-group">
                            <label><?php echo trans('lang.file');?></label>
                            <input name="filename" type="file" id="filename" class=" form-control" required accept="image/*,application/pdf, .xls,.xlsx,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                            <small class="d-block">File allowed are jpeg, png, jpg, pdf, doc, docx, xls, xlsx (max 2mb)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            id="save"><?php echo trans('lang.save');?></button>
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo trans('lang.close');?></button>
                            <span class="saving_data d-none"><?php echo trans('lang.saving_data');?></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end add data-->

    <!--delete data -->
    <div class="modal fade" id="delete" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="#" id="formdelete">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo trans('lang.delete');?></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p><?php echo trans('lang.delete_confirm');?></p>
                    <input type="hidden" value="" name="id" id="iddelete"/>
            
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="delete"><?php echo trans('lang.delete');?></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo trans('lang.close');?></button>
                </div>
            </form>   
        </div>
        </div>
    </div>
    <!--end delete data -->

</section>

<script>
(function($) {
"use strict";

    var id = $("#id").val();
    $.ajax({
        type: "POST",
        url: "{{ url('employeesbyid')}}",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function(data) {
            $(".employeefullname").html(data.message.fullname);
            $(".employeeemail").html(data.message.email);
            $(".employeejobrole").html(data.message.jobrole);
            $(".employeedepartmentname").html(data.message.departmentname);
            $(".employeecity").html(data.message.city);
            $(".employeecountry").html(data.message.country);
            $(".employeeaddress").html(data.message.address);
        }
    });


    //File data
    $('#datafile').DataTable({
        ajax: {
        url: "{{ url('fileemployeebyid')}}",
        type: "post",
        data: function (d) {
              d.employeeid = id;
            },
        },
        columns: [{
                data: 'id',
                orderable: false,
                searchable: false, 
                visible: false
            },
            {
                data: 'created_at'
            },
            {
                data: 'name'
            },
            {
                data: 'filename'
            },
            {
                data: 'action'
            }
        ],
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.file_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.file_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.file_list ');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.file_list ');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            }
        ]
    });

    //onhand data
    $('#dataonhand').DataTable({
        ajax: {
        url: "{{ url('onhandassetbyemployee')}}",
        type: "post",
        data: function (d) {
              d.employeeid = id;
            }
        },
        
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },            
            {
                data: 'date'
            },
           
            {
                data: 'assetname'
            },
            {
                data: 'assettag'
            },
            {
                data: 'serial'
            },
            
           
        ],
       
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3, 4]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.history_list');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4]
                }
            }
        ]
    });

    //history data
    $('#datahistory').DataTable({
        ajax: {
        url: "{{ url('historyassetbyemployee')}}",
        type: "post",
        data: function (d) {
              d.employeeid = id;
            }
        },
        
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },            
            {
                data: 'date'
            },
           
            {
                data: 'assetname'
            },
            {
                data: 'status'
            },
            
           
        ],
       
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list');?>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.history_list');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.history_list');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            }
        ]
    });


    //add data
    $("#formadd").validate({
        submitHandler: function(form) {
            var form = new FormData();
            var name                = $("#name").val();
            var employeeid          = id;
            var filename            = $('#filename')[0].files[0];
            
            form.append('name', name);
            form.append('employeeid', employeeid);
            form.append('filename', filename);
            
            $.ajax({
                type: "POST",
                url: "{{ url('savefile')}}",
                data: form,
                contentType: 'multipart/form-data',
                processData: false,
                contentType: false,
                beforeSend: function () { 
                    $('#save').html($(".saving_data").html());
                    $('#save').prop("disabled",true);
                },
                success: function(data) {
                    if(data.message=='success'){
                        $("#messagesuccess").css({'display':"block"});
                        $('#add').modal('hide');
                        $('#save').prop("disabled",false);
                        window.setTimeout(function(){location.reload()},2000);
                    }
                
                }
            });
        }
    });

    //delete data
    $("#formdelete").validate({
        submitHandler: function(form) {
            $.ajax({
                method: "POST",
                url: "{{ url('deletefile')}}",
                data: $("#formdelete").serialize(),
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $("#messagedelete").css({'display':"block"});
                    $('#delete').modal('hide');
                    window.setTimeout(function(){location.reload()},2000)
                }
            });
        }
    });


    //show delete data
    $('#delete').on('show.bs.modal', function(e) {
        var $modal = $(this),
        id = $(e.relatedTarget).attr('customdata');
        $("#iddelete").val(id);
    });


})(jQuery);
</script>
@endsection