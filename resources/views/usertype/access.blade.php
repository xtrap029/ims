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
                        <form method="post">
                            @csrf
                            @foreach ($list as $key => $group)
                                <div class="row mt-1 mb-1">
                                    <div class="col-md-4">
                                        <h5>{{ $key }}</h5>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            @foreach ($group as $item)
                                                <div class="col-md-3 pl-0 pb-0">
                                                    <div class="form-row mb-0">
                                                        <input type="hidden" name="access[{{$item->id}}]" value="0">
                                                        <input type="checkbox" name="access[{{$item->id}}]" id="access{{$item->id}}" {{ in_array($item->id, $access_types) ? 'checked' : '' }} value="1">
                                                        <label for="access{{$item->id}}" class="ml-2 mt-1 text-body">{{ $item->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            <input type="submit" value="Save Changes" class="btn btn-info btn-fill mb-5 float-right">
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
})(jQuery);
</script>
@endsection