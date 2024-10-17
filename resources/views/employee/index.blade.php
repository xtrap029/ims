@extends('main')
@section('content')

<section class="">
    <div class="content p-4">
        <div class="row pt-3">
            <div class="col-md-6">
                <h3 class=""><?php echo trans('lang.employees_list');?></h3>
            </div>
            <div class="col-md-6 text-md-right pb-md-0 pb-3">
            <button type="button" data-toggle="modal" data-target="#add" class="btn btn-sm btn-fill btn-primary"><i class="fa fa-plus"></i> <?php echo trans('lang.add_data');?></button>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body ">
                    <div id="messagesuccess"  class="display-none alert alert-success"><?php echo trans('lang.data_added');?></div>
					<div id="messagedelete" class="display-none alert alert-success"><?php echo trans('lang.data_deleted');?></div>
					<div id="messageupdate"  class="display-none alert alert-success"><?php echo trans('lang.data_updated');?></div>
                        <div class="table-responsive">
                            <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.fullname');?></th>
                                        <th><?php echo trans('lang.email');?></th>
                                        <th><?php echo trans('lang.jobrole');?></th>
                                        <th><?php echo trans('lang.department');?></th>
                                        <th><?php echo trans('lang.city');?></th>
                                        <th><?php echo trans('lang.action');?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th><?php echo trans('lang.fullname');?></th>
                                        <th><?php echo trans('lang.email');?></th>
                                        <th><?php echo trans('lang.jobrole');?></th>
                                        <th><?php echo trans('lang.department');?></th>
                                        <th><?php echo trans('lang.city');?></th>
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

    <!--add new data -->
    <div id="add" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" id="formadd" enctype="multipart/form-data">
                    <div class="modal-header">
                       
                        <h5 class="modal-title"><?php echo trans('lang.add_data');?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <div  class="display-none messageexist alert alert-success"><?php echo trans('lang.data_exist');?></div>
                        <div class="form-group">
                            <label><?php echo trans('lang.fullname');?></label>
                            <input name="fullname" type="text" id="fullname" class=" form-control" required placeholder="<?php echo trans('lang.fullname');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.email');?></label>
                            <input name="email" type="email" id="email" class=" form-control" required placeholder="<?php echo trans('lang.email');?>"/>
                        </div>
                       
                        <div class="form-group">
                            <label><?php echo trans('lang.jobrole');?></label>
                            <input name="jobrole" type="text" id="jobrole" class=" form-control" required placeholder="<?php echo trans('lang.jobrole');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.department');?></label>
                            <select name="department" id="department" required class="form-control">
                                <option value=""><?php echo trans('lang.department');?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.city');?></label>
                            <input name="city" type="text" id="city" class=" form-control" required placeholder="<?php echo trans('lang.city');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.country');?></label>
                            <select id="country" class="form-control" name="country" required>
                                <option value=""><?php echo trans('lang.country');?></option>
                                @foreach (config('countries') as $item)
                                    <option value="{{ $item[0] }}">{{ $item[1] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.address');?></label>
                            <textarea id="address" class="form-control" placeholder="<?php echo trans('lang.address');?>"></textarea>
                        </div>
                        
                       
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            id="save"><?php echo trans('lang.save');?></button>
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo trans('lang.close');?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end add data-->

    <!--edit new data -->
    <div id="edit" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" id="formedit" enctype="multipart/form-data">
                    <div class="modal-header">
                       
                        <h5 class="modal-title"><?php echo trans('lang.edit_data');?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <div  class="display-none messageexist alert alert-success"><?php echo trans('lang.data_exist');?></div>
                    <div class="form-group">
                            <label><?php echo trans('lang.fullname');?></label>
                            <input name="fullname" type="text" id="editfullname" class=" form-control" required placeholder="<?php echo trans('lang.fullname');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.email');?></label>
                            <input name="email" type="email" id="editemail" class=" form-control" required placeholder="<?php echo trans('lang.email');?>"/>
                        </div>
                       
                        <div class="form-group">
                            <label><?php echo trans('lang.jobrole');?></label>
                            <input name="jobrole" type="text" id="editjobrole" class=" form-control" required placeholder="<?php echo trans('lang.jobrole');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.department');?></label>
                            <select name="department" id="editdepartment" required class="form-control">
                                <option value=""><?php echo trans('lang.department');?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.city');?></label>
                            <input name="city" type="text" id="editcity" class=" form-control" required placeholder="<?php echo trans('lang.city');?>"/>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.country');?></label>
                            <select id="editcountry" class="form-control" name="country" required>
                                <option value=""><?php echo trans('lang.country');?></option>
                                @foreach (config('countries') as $item)
                                    <option value="{{ $item[0] }}">{{ $item[1] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label><?php echo trans('lang.address');?></label>
                            <textarea name="address" id="editaddress" class="form-control" placeholder="<?php echo trans('lang.address');?>"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="editid"/>
                        <button type="submit" class="btn btn-primary"
                            id="saveedit"><?php echo trans('lang.save');?></button>
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal"><?php echo trans('lang.close');?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end edit data-->

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
    $('#data').DataTable({

        ajax: "{{ url('employees')}}",
       
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },
            
            {
                data: 'fullname'
            },
           
            {
                data: 'email'
            },

            {
                data: 'jobrole'
            },
            {
                data: 'department'
            },
            {
                data: 'city'
            },
            {
                data: 'action',
                orderable: false,
                searchable: false
            }
        ],
      
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.employees_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.employees_list');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.employees_list');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.employees_list');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            }
        ]
    });


//get all department
$.ajax({
        type: "GET",
		url: "{{ url('listdepartment')}}",
		dataType: "JSON",
		success: function(html) {
            var objs = html.message;
            jQuery.each(objs, function (index, record) {
                var id = decodeURIComponent(record.id);
                var name = decodeURIComponent(record.name);
                $("#department").append($("<option></option>")
                    .attr("value",id)
                    .text(name)); 
                $("#editdepartment").append($("<option></option>")
                    .attr("value",id)
                    .text(name));     
            });
		}   
    });  

//add data
$("#formadd").validate({
    submitHandler: function(form) {
        $.ajax({
			method: "POST",
            url: "{{ url('saveemployees')}}",
            data: $("#formadd").serialize(),
            dataType: "JSON",
            success: function(data) {
                if(data.message=='success'){
                    $("#messagesuccess").css({'display':"block"});
                    $('#add').modal('hide');
                    window.setTimeout(function(){location.reload()},2000);
                }
                if(data.message=='exist'){
                    $(".messageexist").css({'display':"block"});
                }
            }
		});
    }
});

//edit data
$("#formedit").validate({
    submitHandler: function(form) {
        $.ajax({
			method: "POST",
            url: "{{ url('updateemployees')}}",
            data: $("#formedit").serialize(),
            dataType: "JSON",
            success: function(data) {
                if(data.message=='success'){
                    $("#messageupdate").css({'display':"block"});
                    $('#edit').modal('hide');
                    window.setTimeout(function(){location.reload()},2000);
                }
                if(data.message=='exist'){
                    $(".messageexist").css({'display':"block"});
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
            url: "{{ url('deleteemployees')}}",
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

//show edit data
$('#edit').on('show.bs.modal', function(e) {
    var $modal = $(this),
    id = $(e.relatedTarget).attr('customdata');
	$.ajax({
		type: "POST",
		url: "{{ url('employeesbyid')}}",
		data: {id:id},
		dataType: "JSON",
		success: function(data) {
			$("#editid").val(id);
            $("#editfullname").val(data.message.fullname);
            $("#editdepartment").val(data.message.departmentid);
            $("#editemail").val(data.message.email);
            $("#editjobrole").val(data.message.jobrole);
            $("#editcity").val(data.message.city);
            $("#editcountry").val(data.message.country);
            $("#editaddress").val(data.message.address);
		}   
	});
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