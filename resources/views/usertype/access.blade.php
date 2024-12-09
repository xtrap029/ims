@extends('main')
@section('content')

<section class="">
    <div class="content p-4">
        <div class="row pt-3 mb-3">
            <div class="col-md-6">
                <h3 class=""><?php echo trans('lang.usertype_access')." - ".$data->name;?></h3>
            </div>
            <div class="col-md-6">
                <a href="{{ url('usertypelist') }}" class="btn btn-default float-right">Back</a>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @foreach ($list as $key => $group)
                            <div class="row mt-1 mb-1">
                                <div class="col-md-4">
                                    <h5>{{ $key }}</h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        @foreach ($group as $item)
                                            <div class="col-md-3">
                                                <div class="form-row mb-2">
                                                    <input type="checkbox" name="" id="">
                                                    <label for="" class="ml-2 mt-1 text-body">{{ $item->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <input type="submit" value="Save Changes" class="btn btn-info btn-fill mb-5 float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function($) {
"use strict";  
})(jQuery);
</script>
@endsection