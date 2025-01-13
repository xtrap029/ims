@extends('main')
@section('content')

<section class="">
    <div class="content p-4">
        <div class="row pt-3">
            <div class="col-md-6">
                <h3 class=""><?php echo trans('lang.import_assets');?></h3>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body ">    
                        @if (isset($error) || $errors->any())
                            <div class="alert bg-danger text-white mb-5">
                                <p><b>IMPORT ABORTED</b></p>
                                <p>Please see the error details below:</p>
                                <p>Some rows from the CSV file were successfully imported, but the import process was aborted upon encountering a faulty row.</p>
                                <p>Steps to Resolve:</p>
                                <ol>
                                    <li><b>Fix the Faulty Row</b>: Locate and correct the problematic row in your CSV file.</li>
                                    <li><b>Avoid Duplicate Imports</b>: Remove rows that were successfully imported (if any) to ensure no duplicates are created during the next import attempt.</li>
                                </ol>
                                <p>After addressing the issues, retry the import process.</p>
                            </div>  
                        @endif  
                        @if (isset($isSuccess))
                            <div class="alert bg-success text-white mb-5">
                                <p><b>IMPORT SUCCESS</b></p>
                                <p>Please check and verify generated assets in Assets Page.</p>
                            </div>  
                        @endif                
                        @if (isset($currentRow) || isset($listSuccess))
                            <div class="table-responsive overflow-auto mb-5">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">#</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("NAME"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("ASSET_TAG"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("SUPPLIER"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("LOCATION"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("BRAND"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("SERIAL_NUMBER"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("ASSET_TYPE"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("COST"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("PURCHASE_DATE"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("WARRANTY"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("STATUS"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("DESCRIPTION"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("ASSET_STATUS"))) }}</th>
                                            <th class="text-nowrap">{{ str_replace("_", " ", ucfirst(strtolower("PREVIOUSLY_INSTALLED"))) }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($listSuccess))
                                            @foreach ($listSuccess as $key => $item)
                                                <tr class="table-success">
                                                    <td>{{ $key + 1 }}</td>
                                                    <td class="text-nowrap">{{ $item['NAME'] ?: '-' }}</td>
                                                    <td class="text-nowrap">{{ $item['ASSET_TAG'] ?: '-' }}</td>
                                                    <td>{{ $item['SUPPLIER'] ?: '-' }}</td>
                                                    <td>{{ $item['LOCATION'] ?: '-' }}</td>
                                                    <td>{{ $item['BRAND'] ?: '-' }}</td>
                                                    <td>{{ $item['SERIAL_NUMBER'] ?: '-' }}</td>
                                                    <td>{{ $item['ASSET_TYPE'] ?: '-' }}</td>
                                                    <td class="text-nowrap">{{ $item['COST'] ?: '-' }}</td>
                                                    <td>{{ $item['PURCHASE_DATE'] ?: '-' }}</td>
                                                    <td>{{ $item['WARRANTY'] ?: '-' }}</td>
                                                    <td>{{ $item['STATUS'] ?: '-' }}</td>
                                                    <td style="max-width: 200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $item['DESCRIPTION'] ?: '-' }}</td>
                                                    <td>{{ $item['ASSET_STATUS'] ?: '-' }}</td>
                                                    <td>{{ $item['PREVIOUSLY_INSTALLED'] ?: '-' }}</td>
                                                </tr>
                                            @endforeach                                            
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        @if (isset($currentRow))
                                            <tr class="table-danger">
                                                <td>{{ count($listSuccess)+1 }}</td>
                                                <td class="text-nowrap">{{ $currentRow['NAME'] ?: '-' }}</td>
                                                <td>{{ $currentRow['ASSET_TAG'] ?: '-' }}</td>
                                                <td>{{ $currentRow['SUPPLIER'] ?: '-' }}</td>
                                                <td>{{ $currentRow['LOCATION'] ?: '-' }}</td>
                                                <td>{{ $currentRow['BRAND'] ?: '-' }}</td>
                                                <td>{{ $currentRow['SERIAL_NUMBER'] ?: '-' }}</td>
                                                <td>{{ $currentRow['ASSET_TYPE'] ?: '-' }}</td>
                                                <td class="text-nowrap">{{ $currentRow['COST'] ?: '-' }}</td>
                                                <td>{{ $currentRow['PURCHASE_DATE'] ?: '-' }}</td>
                                                <td>{{ $currentRow['WARRANTY'] ?: '-' }}</td>
                                                <td>{{ $currentRow['STATUS'] ?: '-' }}</td>
                                                <td style="max-width: 200px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $currentRow['DESCRIPTION'] ?: '-' }}</td>
                                                <td>{{ $currentRow['ASSET_STATUS'] ?: '-' }}</td>
                                                <td>{{ $currentRow['PREVIOUSLY_INSTALLED'] ?: '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="15" class="bg-danger text-white">
                                                    @if (isset($error))
                                                        {{ $error }}
                                                    @endif
                    
                                                    @if ($errors->any())
                                                        @foreach ($errors->all() as $error)
                                                            {{ $error }}</br>
                                                        @endforeach
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    </tfoot>
                                </table>
                            </div>                                
                        @endif                        
                        
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="csv" id="">
                            <button class="btn btn-sm btn-fill btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection