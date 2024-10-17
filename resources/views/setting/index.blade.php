@extends('main')
@section('content')

<section class="">
    <div class="content p-4">
        <div class="row pt-3">
            <div class="col-md-6">
                <h3 class=""><?php echo trans('lang.app_setting');?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body ">
                        <div id="messageupdate"  class="display-none alert alert-success">
                            <?php echo trans('lang.data_updated');?></div>
                        <form action="#" id="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label><?php echo trans('lang.company');?></label>
                                    <input name="company" type="text" id="company" class="form-control" required
                                        placeholder="<?php echo trans('lang.company');?>" />
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo trans('lang.email');?></label>
                                    <input name="email" type="email" id="email" class="form-control" required
                                        placeholder="<?php echo trans('lang.email');?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><?php echo trans('lang.phone');?></label>
                                    <input name="phonenumber" type="text" id="phone" class="form-control" required
                                        placeholder="<?php echo trans('lang.phone');?>" />
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo trans('lang.formatdate');?></label>
                                    <select name="formatdate" id="formatdate" class="form-control" required>
                                        <option value="d-m-Y">d-m-Y</option>
                                        <option value="m-d-Y">m-d-Y</option>
                                        <option value="Y-m-d">Y-m-d</option>
                                        <option value="d/m/Y">d/m/Y</option>
                                        <option value="m/d/Y">m/d/Y</option>
                                        <option value="Y/m/d">Y/m/d</option>
                                        <option value="d.m.Y">d.m.Y</option>
                                        <option value="m.d.Y">m.d.Y</option>
                                        <option value="Y.m.d">Y.m.d</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><?php echo trans('lang.language');?></label>
                                    <select name="language" id="language" class="form-control" required>
                                        <option value="en">en</option>
                                    </select>
                                </div>
								<div class="col-md-6">
                                    <label><?php echo trans('lang.country');?></label>
                                    <select name="country" id="country" class="form-control" required>
										@foreach (config('countries') as $item)
											<option value="{{ $item[0] }}">{{ $item[1] }}</option>
										@endforeach
                                    </select>
                                </div>
                                
                            </div>
							<div class="row">
                                <div class="col-md-6">
                                    <label><?php echo trans('lang.currency');?></label>
									<input name="currency" type="text" id="currency" class="form-control" required
                                        placeholder="<?php echo trans('lang.currency');?>" />
                                </div>

                                <div class="col-md-6">
                                    <label><?php echo trans('lang.address');?></label>
                                    <textarea class="form-control" name="address" id="address"
                                        placeholder="<?php echo trans('lang.address');?>"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label><?php echo trans('lang.logo');?></label>
                                    <input name="logo" type="file" id="logo" class="form-control"
                                        placeholder="<?php echo trans('lang.logo');?>" />
                                </div>
                                <div class="col-md-6">
                                    <img id="logoimg" src="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pt-3">
                                    <input type="hidden" id="id" name="id" />
                                    <button type="submit" class="btn btn-primary"
                                        id="save"><?php echo trans('lang.save');?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<script>
(function($) {
"use strict";  

    //edit data
    $("#form").validate({
		rules: {
			phonenumber: {
				required: true,
				digits: true
			}
		},
        submitHandler: function(form) {

            var form = new FormData();
            var company 	= $("#company").val();
            var email 		= $("#email").val();
            var address 	= $("#address").val();
            var phone 		= $("#phone").val();
            var language 	= $("#language").val();
			var country 	= $("#country").val();
			var currency 	= $("#currency").val();
            var formatdate 	= $("#formatdate").val();
            var logo 		= $('#logo')[0].files[0];


            form.append('company', company);
            form.append('email', email);
            form.append('address', address);
            form.append('phonenumber', phone);
            form.append('language', language);
			form.append('country', country);
			form.append('currency', currency);
            form.append('formatdate', formatdate);
            form.append('logo', logo);

            $.ajax({
                method: "POST",
                url: "{{ url('updatesettings')}}",
                data: form,
                contentType: 'multipart/form-data',
                processData: false,
                contentType: false,
                success: function(data) {
                    if(data.message=='success'){
                        $("#messageupdate").css({
                            'display': "block"
                        });
                        window.setTimeout(function() {
                            location.reload()
                        }, 2000)
                    }
                }
            });
        }
    });


    //get app setting
    $.ajax({
        type: "GET",
        url: "{{ url('settings')}}",
        dataType: "JSON",
        success: function(data) {
            $("#id").val(id);
            $("#company").val(data.data.company);
            $("#email").val(data.data.email);
            $("#phone").val(data.data.phonenumber);
            $("#formatdate").val(data.data.formatdate);
            $("#address").val(data.data.address);
            $("#country").val(data.data.country);
			$("#currency").val(data.data.currency);
            $("#language").val(data.data.language);
            $("#logoimg").attr("src", data.logo);
        }
    });

})(jQuery);
</script>
@endsection