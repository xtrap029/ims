@extends('main')
@section('content')

<section class="">
    <div class="content bg-dark d-none d-md-block">
        <div class="row px-4 pt-3 pb-2">
            <div class="col-md-8 px-4">
                <p class="title-detail font-bold mb-2">
                    <span class="assetname d-block text-white" style="margin-bottom: -10px;"></span>
                    <span class="assettag text-help font-weight-normal" style="font-size: 17px;"></span>
                    <a href="#_" class="text-white vlign--top jsCopy" data-toggle="tooltip" data-placement="top" title="Copy to clipboard"><i class="fa fa-copy w-auto" style="font-size: 15px;"></i></a>
                </p>
                <p class="assetdetail">
                    <label class="badge badge-pill badge-success p-2 assettype"></label>
                    <span class="assetstatus"></span>
                </p>
            </div>
            <div class="col-md-4 text-md-right px-4">
                <div>
                    <a target="_blank" href="{{url('assetlist/generatelabel', $id)}}" id="btndetail" class="d-inline-block">
                        <div class="assetbarcode bg-white p-1 rounded"></div>
                    </a>
                </div>  
            </div>    
        </div>
    </div>
    <div class="content bg-dark d-md-none">
        <div class="row p-4">
            <div class="px-4">
                <p class="title-detail font-bold mb-2">
                    <span class="assetname d-block text-white"></span>
                </p>
            </div>
            <div class="px-4 mt-2 row">
                <div class="col-5">
                    <a target="_blank" href="{{url('assetlist/generatelabel', $id)}}" id="btndetail" class="d-inline-block">
                        <div class="assetbarcodemobile bg-white p-1 rounded"></div>
                    </a>
                </div>
                <p class="assetdetail col-7">
                    <span class="assettag text-help font-weight-normal" style="font-size: 20px;"></span>
                    <a href="#_" class="text-white vlign--top jsCopy" data-toggle="tooltip" data-placement="top" title="Copy to clipboard"><i class="fa fa-copy w-auto" style="font-size: 18px;"></i></a>
                    <label class="badge badge-pill badge-success p-2 assettype mt-3"></label>
                    <br>
                    <span class="assetstatus"></span>
                </p>
            </div>    
        </div>
    </div>
    <div class="content p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-9">
                                <input type="hidden" value="{{ $id }}" name="id" id="id" />
                            </div>                        
                            <div class="col-md-3"></div>                                    
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
                                        <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery"
                                            role="tab" aria-controls="gallery"
                                            aria-selected="false"><?php echo trans('lang.gallery');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#components"
                                            role="tab" aria-controls="components"
                                            aria-selected="false"><?php echo trans('lang.components');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#maintenance"
                                            role="tab" aria-controls="maintenance"
                                            aria-selected="false"><?php echo trans('lang.maintenances');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history"
                                            role="tab" aria-controls="history"
                                            aria-selected="false"><?php echo trans('lang.history');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="file-tab" data-toggle="tab" href="#file"
                                            role="tab" aria-controls="file"
                                            aria-selected="false"><?php echo trans('lang.file');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="depreciate-tab" data-toggle="tab" href="#depreciate"
                                            role="tab" aria-controls="depreciate"
                                            aria-selected="false"><?php echo trans('lang.depreciation');?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="activity-tab" data-toggle="tab" href="#activity"
                                            role="tab" aria-controls="activity"
                                            aria-selected="false"><?php echo trans('lang.activitylog');?></a>
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
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.serial');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetserial"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.brand');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetbrand"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.purchasedate');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetpurchasedate"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold"><?php echo trans('lang.cost');?>:
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetcost"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.warranty');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetwarranty"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.location');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetlocation"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.supplier');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetsupplier"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.updatedat');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetupdated"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.createdat');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetcreated"></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td bgcolor="#f2f3f4" width="200">
                                                            <p class="mb-0 font-bold">
                                                                <?php echo trans('lang.description');?>:</p>
                                                        </td>
                                                        <td>
                                                            <p class="mb-0 assetdescription"></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-3 pt-2 text-center">
                                                <button type="button" class="btn btn-simple" data-toggle="modal" data-target="#magnifypicture">
                                                    <img width="250" class="img-responsive assetimage" src="" />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="components" role="tabpanel"
                                        aria-labelledby="components-tab">
                                         <div class="table-responsive  pt-4">
                                         <table id="datacomponent" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.picture');?></th>
                                                        <th><?php echo trans('lang.name');?></th>
                                                        <th><?php echo trans('lang.type');?></th>
                                                        <th><?php echo trans('lang.brand');?></th>
                                                        <th><?php echo trans('lang.quantity');?></th>
                                                        <th><?php echo trans('lang.avalaiblequantity');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.picture');?></th>
                                                        <th><?php echo trans('lang.name');?></th>
                                                        <th><?php echo trans('lang.type');?></th>
                                                        <th><?php echo trans('lang.brand');?></th>
                                                        <th><?php echo trans('lang.quantity');?></th>
                                                        <th><?php echo trans('lang.avalaiblequantity');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
                                            </table>


                                         </div>
                                    </div>
                                    <div class="tab-pane fade" id="gallery" role="tabpanel"
                                        aria-labelledby="gallery-tab">
                                        <div class="text-md-right text-left pt-2">
                                            <button type="button" data-toggle="modal" data-target="#addgallery" class="btn btn-sm btn-fill btn-primary"><i class="fa fa-plus"></i> <?php echo trans('lang.add_data');?></button>
                                        </div>
                                        <div class="table-responsive  pt-4">
                                            <table id="datagallery" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.file');?></th>
                                                        <th><?php echo trans('lang.name');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.file');?></th>
                                                        <th><?php echo trans('lang.name');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="maintenance" role="tabpanel"
                                        aria-labelledby="maintenance-tab">
                                        <div class="table-responsive  pt-4">
                                            <table id="datamaintenance" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.asset');?></th>
                                                        <th><?php echo trans('lang.supplier');?></th>
                                                        <th><?php echo trans('lang.type');?></th>
                                                        <th><?php echo trans('lang.startdate');?></th>
                                                        <th><?php echo trans('lang.enddate');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.asset');?></th>
                                                        <th><?php echo trans('lang.supplier');?></th>
                                                        <th><?php echo trans('lang.type');?></th>
                                                        <th><?php echo trans('lang.startdate');?></th>
                                                        <th><?php echo trans('lang.enddate');?></th>
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
                                                        <th><?php echo trans('lang.employee');?></th>
                                                        <th><?php echo trans('lang.location');?></th>
                                                        <th><?php echo trans('lang.createdby');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.date');?></th>
                                                        <th><?php echo trans('lang.assetname');?></th>
                                                        <th><?php echo trans('lang.employee');?></th>
                                                        <th><?php echo trans('lang.location');?></th>
                                                        <th><?php echo trans('lang.createdby');?></th>
                                                        <th><?php echo trans('lang.action');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
                                            </table>
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
                                    <div class="tab-pane fade" id="depreciate" role="tabpanel"
                                        aria-labelledby="depreciate-tab">
                                       
                                        <div class="table-responsive  pt-4">
                                            <table id="datadepreciate" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th><?php echo trans('lang.period');?></th>
                                                        <th><?php echo trans('lang.bookvalue');?></th>
                                                        <th><?php echo trans('lang.depreciationpercentage');?></th>
                                                        <th><?php echo trans('lang.amount');?></th>
                                                        <th><?php echo trans('lang.accumulateddepreciation');?></th>
                                                        <th><?php echo trans('lang.endingbookvalue');?></th>
                                                    </tr>
                                                </thead>
                                                
                                                <tfoot>
                                                    <tr>
                                                        <th><?php echo trans('lang.period');?></th>
                                                        <th><?php echo trans('lang.bookvalue');?></th>
                                                        <th><?php echo trans('lang.depreciationpercentage');?></th>
                                                        <th><?php echo trans('lang.amount');?></th>
                                                        <th><?php echo trans('lang.accumulateddepreciation');?></th>
                                                        <th><?php echo trans('lang.endingbookvalue');?></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="calculator-list">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="activity" role="tabpanel"
                                        aria-labelledby="activity-tab">
                                        <div class="table-responsive  pt-4">
                                            <table id="dataactivity" class="table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.description');?></th>
                                                        <th><?php echo trans('lang.user');?></th>
                                                        <th><?php echo trans('lang.changes');?></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th><?php echo trans('lang.description');?></th>
                                                        <th><?php echo trans('lang.user');?></th>
                                                        <th><?php echo trans('lang.changes');?></th>
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

    <div id="magnifypicture" class="modal fade" role="dialog" >
        <div class="modal-dialog" style="width: 90%; max-width: 90%;">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-responsive assetimage w-100" src="" />
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
    <div id="addgallery" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" id="galleryadd">
                    <div class="modal-header">
                       
                        <h5 class="modal-title"><?php echo trans('lang.add_data');?></h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo trans('lang.name');?></label>
                            <input name="name" type="text" id="namegallery" class=" form-control" required placeholder="<?php echo trans('lang.name');?>"/>
                        </div>
                        
                        <div class="form-group">
                            <label><?php echo trans('lang.file');?></label>
                            <input name="filename" type="file" id="filenamegallery" class=" form-control" required accept="image/*,application/pdf, .xls,.xlsx,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                            <small class="d-block">File allowed are jpeg, png, jpg, pdf, doc, docx, xls, xlsx (max 2mb)</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"
                            id="savegallery"><?php echo trans('lang.save');?></button>
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
        url: "{{ url('assetbyid')}}",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function(data) {
            $(".assetname").html(data.message.assetname);
            $(".assettag").html(data.message.assettag);
            $(".assettype").html(data.message.type);
            $(".assetsupplier").html(data.message.supplier);
            $(".assetstatus").html(data.assetstatus);
            $(".assetbrand").html(data.message.brand);
            $(".assettype2").html(data.message.type);
            $(".assetpurchasedate").html(data.assetpurchasedate);
            $(".assetcost").html(data.assetcost);
            $(".assetwarranty").html(data.assetwarranty);
            $(".assetdescription").html(data.message.assetdescription);
            $(".assetcreated").html(data.assetcreated_at);
            $(".assetupdated").html(data.assetupdated_at);
            $(".assetserial").html(data.message.serial);
            $(".assetlocation").html(data.message.location);
            $(".assetbarcode").html(data.assetbarcode);
            $(".assetbarcodemobile").html(data.assetbarcodemobile);


            $(".assetimage").attr("src", data.assetimage);
        }
    });
    

    //get calculator
    $.ajax({
        type: "POST",
		url: "{{ url('depreciationvaluebyid')}}",
		data: {id:id},
		dataType: "JSON",
		success: function(html) {
            if(html.success=='failed'){
                $("#calculator-list").append($("<tr><td align='center' colspan='6'>No Data</td></tr>"));
            }else{
            
                var objs = html.message;
                var id = decodeURIComponent(objs.assetid);
                var cost = decodeURIComponent(objs.assetcost);
                var assetvalue = decodeURIComponent(objs.assetvalue);
                var period = decodeURIComponent(objs.period);
                var per=1;
                var endvalue = 0;
                var percentage;
                var accumulateddep = 0;
                var annualdep = (cost - assetvalue) / period;  
                accumulateddep = annualdep;
                endvalue = cost-annualdep;
                percentage = 100 / period;

                for (per = 1; per <= period; per++) {
                    $("#calculator-list").append($("<tr><td>"+per+"</td><td>"+cost+"</td><td>"+percentage.toFixed(2)+"%</td><td>"+annualdep.toFixed(2)+"</td><td>"+accumulateddep.toFixed(2)+"</td> <td>"+endvalue.toFixed(2)+"</td></tr>"));
                    cost=endvalue.toFixed(2);
                    accumulateddep+=annualdep;
                    endvalue=cost-annualdep;                    
                };
            }
		}   
    }); 

    //maintenance data
    $('#datamaintenance').DataTable({
        ajax: {
        url: "{{ url('maintenanceassetsbyid')}}",
        type: "post",
        data: function (d) {
              d.assetid = id;
            },
        },
       
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
                data: 'supplier'
            },
            {
                data: 'type'
            },
            {
                data: 'startdate'
            },
            {
                data: 'enddate'
            }
        ],
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.maintenance_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.maintenance_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.maintenance_list ');?>',
                orientation: 'landscape',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                },
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
                        .join('*').split('');
                }
            },
            {
                extend: 'print',
                title: '<?php echo trans('lang.maintenance_list ');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5]
                }
            }
        ]
    });


    //component data
    $('#datacomponent').DataTable({
        ajax: {
        url: "{{ url('componentassetbyid')}}",
        type: "post",
        data: function (d) {
              d.assetid = id;
            }
        },
        
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },
            
            {
                data: 'pictures'
            },
           
            {
                data: 'name'
            },
            {
                data: 'type'
            },
            {
                data: 'brand'
            },
            {
                data: 'quantity'
            },
            {
                data: 'avalaiblequantity'
            },
           
        ],
       
        buttons: [{
                extend: 'copy',
                text: 'Copy <i class="fa fa-files-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.component_list ');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            },
            {
                extend: 'csv',
                text: 'CSV <i class="fa fa-file-excel-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.component_list');?>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            },
            {
                extend: 'pdf',
                text: 'PDF <i class="fa fa-file-pdf-o"></i>',
                className: 'btn btn-sm btn-fill btn-info ',
                title: '<?php echo trans('lang.component_list');?>',
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
                title: '<?php echo trans('lang.component_list');?>',
                className: 'btn btn-sm btn-fill btn-info ',
                text: 'Print <i class="fa fa-print"></i>',
                exportOptions: {
                    columns: [1, 2, 3, 4 ,5]
                }
            }
        ]
    });


    //history data
    $('#datahistory').DataTable({
        ajax: {
        url: "{{ url('historyassetbyid')}}",
        type: "post",
        data: function (d) {
              d.assetid = id;
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
                data: 'employeename'
            },
            {
                data: 'locationname'
            },
            {
                data: 'username'
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
                    columns: [1, 2, 3, 4 ]
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
                    columns: [1, 2, 3, 4 ]
                }
            }
        ]
    });

    //activity log data
    $('#dataactivity').DataTable({
        ajax: {
        url: "{{ url('activityassetbyid')}}",
        type: "post",
        data: function (d) {
              d.assetid = id;
            }
        },
        
        columns: [{
            data: 'id',
                orderable: false,
                searchable: false,
                visible: false
            },
            {
                data: 'description'
            },
            {
                data: 'user'
            },
            {
                data: 'properties'
            }
        ],
        buttons: []
    });


    //File data
    $('#datafile').DataTable({
        ajax: {
        url: "{{ url('fileassetsbyid')}}",
        type: "post",
        data: function (d) {
              d.assetid = id;
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
        ],
    });
    $('#datagallery').DataTable({
        ajax: {
        url: "{{ url('fileassetgallerybyid')}}",
        type: "post",
        data: function (d) {
              d.assetgalleryid = id;
            },
        },
        columns: [{
                data: 'id',
                orderable: false,
                searchable: false, 
                visible: false
            },
            {
                data: 'filename',
            },
            {
                data: 'name'
            },
            {
                data: 'action'
            }
        ],
        buttons: [
        ]
    });


    //add data
    $("#formadd").validate({
        submitHandler: function(form) {
            var form = new FormData();
            var name                = $("#name").val();
            var assetid             = id;
            var filename            = $('#filename')[0].files[0];
            
            form.append('name', name);
            form.append('assetid', assetid);
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
    $("#galleryadd").validate({
        submitHandler: function(form) {
            var form = new FormData();
            var namegallery                = $("#namegallery").val();
            var assetgalleryid             = id;
            var filenamegallery            = $('#filenamegallery')[0].files[0];
            
            form.append('name', namegallery);
            form.append('assetgalleryid', assetgalleryid);
            form.append('filename', filenamegallery);
            
            $.ajax({
                type: "POST",
                url: "{{ url('savefile')}}",
                data: form,
                contentType: 'multipart/form-data',
                processData: false,
                contentType: false,
                beforeSend: function () { 
                    $('#savegallery').html($(".saving_data").html());
                    $('#savegallery').prop("disabled",true);
                },
                success: function(data) {
                    if(data.message=='success'){
                        $("#messagesuccess").css({'display':"block"});
                        $('#add').modal('hide');
                        $('#savegallery').prop("disabled",false);
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

    // $('[data-toggle="tooltip"]').tooltip()

    $('.jsCopy').click(function() {
        selectText($(".assettag"));
        
        // $(this).attr('data-original-title', "Copied")
        //     .tooltip('show')
    })

    // $('.jsCopy').mouseleave(function() {
    //     $(this).attr("data-original-title","Copy to clipboard")
    // })

    function selectText(element) {
        const range = document.createRange();
        range.selectNodeContents(element[0]);  // jQuery returns an array-like object, so we need [0] to access the DOM element
        const selection = window.getSelection();
        selection.removeAllRanges();
        selection.addRange(range);
        document.execCommand("copy")
        document.getSelection().removeAllRanges()
    }
})(jQuery);
</script>
@endsection