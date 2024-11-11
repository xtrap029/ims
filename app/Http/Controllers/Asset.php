<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetsModel;
use App\ActivityLogModel;
use Spatie\Activitylog\Contracts\Activity;
use Illuminate\Support\Facades\File; 
use Yajra\Datatables\Datatables;
use App\Http\Controllers\TraitSettings;
use DB;
use App\User;
use App;
use Auth;
use Milon\Barcode\DNS2D;


class Asset extends Controller
{
    use TraitSettings;

    public function __construct() {
        
        $data = $this->getapplications(); 
        $lang = $data->language;
        App::setLocale($lang);
        $this->middleware('auth');
    }

    //return page
    public function index() {
        return view( 'asset.index' );
    }

    
    /**
     * get  detail page
     * @return object
     */
    public function detail($id){
        return view('asset.detail', compact('id'));
    }


    /**
     * get print label page
     * @return object
     */
    public function generatelabel($id){
        return view('asset.generate')->with('id', $id);
    }


    /**
     * get data from database
     * @return object
     */
    public function getdata(){
        $data = DB::select("select assets.*, supplier.name as supplier, brand.name as brand, asset_type.name as type , location.name as location
        from assets left join supplier 
        on assets.supplierid = supplier.id
        left join brand 
        on assets.brandid = brand.id
        left join asset_type
        on assets.typeid = asset_type.id
        left join location
        on assets.locationid = location.id
        order by assets.created_at desc"); 
        return Datatables::of($data)
        ->addColumn('pictures',function($single){
            return '<img src="'.url('/').'/upload/assets/'.$single->picture.'" style="width:90px"/>';
        })
        ->addColumn( 'action', function ( $accountsingle ) {
            //for checkout 2 button, checkin or checkout depand the record
            //$checkout = '  <a class="dropdown-item" href="#" id="btncheckout" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#checkout"><i class="fa fa-check"></i> '. trans('lang.checkout').'</a>';

            if($accountsingle->checkstatus===2){
                    
                    $checkout = '<a class="dropdown-item" href="#" id="btncheckin" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#checkin"><i class="fa fa-check"></i> '. trans('lang.checkin').'</a>';
                
            }else{
                    $checkout = '<a class="dropdown-item" href="#" id="btncheckout" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#checkout"><i class="fa fa-check"></i> '. trans('lang.checkout').'</a>';
            }

            return '
                <div class="btn-group">
                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu actionmenu">
                '.$checkout.'
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="'.url('/').'/assetlist/detail/'.$accountsingle->id.'"id="btndetail" customdata='.$accountsingle->id.'  ><i class="fa fa-file-text"></i> '. trans('lang.detail').'</a>
                <a class="dropdown-item" href="#" id="btnedit" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> '. trans('lang.edit').'</a>
                <a class="dropdown-item" href="#" id="btnedit" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> '. trans('lang.delete').'</a>
                </div>
            </div>';
           
        } )->rawColumns(['pictures', 'action'])
        ->make(true);       
    }



    /**
     * get single data by assets id for history
     * @param integer $id
     * @return object
     */

    public function historyassetbyid( Request $request ) {
        $id            = $request->input( 'assetid' );

      $data = DB::select("
        select asset_history.*, 
            assets.name as assetname, 
            IFNULL(employees.fullname, '-') as employeename,
            IFNULL(users.fullname, '-') as username,
            location.name as locationname
        from asset_history left join assets  
        on asset_history.assetid = assets.id
        left join location 
        on assets.locationid = location.id
        left join employees 
        on asset_history.employeeid = employees.id
        left join users
        on asset_history.userid = users.id
        where asset_history.assetid = '$id'
        order by asset_history.created_at desc"); 
        return Datatables::of($data)
        
        ->addColumn('status',function($single){
            if($single->status=='1'){
                $status = trans('lang.checkout');
            }
             if($single->status=='2'){
                $status = trans('lang.checkin');
            }
            return $status;
        })

         ->addColumn('date',function($single){

            $setting = DB::table('settings')->where('id', '1')->first();
            return date($setting->formatdate, strtotime($single->date));
        })
        ->rawColumns(['status','date'])
        ->make(true);
        
    }

    /**
     * get single data by employee id for history
     * @param integer $id
     * @return object
     */

    public function historyassetbyemployee( Request $request ) {
        $id            = $request->input( 'employeeid' );

      $data = DB::select("select asset_history.*, assets.name as assetname

        from asset_history left join assets  
        on asset_history.assetid = assets.id
        where asset_history.employeeid = '$id'
        order by asset_history.created_at desc"); 
        return Datatables::of($data)
        
        ->addColumn('status',function($single){
            if($single->status=='1'){
                $status = trans('lang.checkout');
            }
             if($single->status=='2'){
                $status = trans('lang.checkin');
            }
            return $status;
        })

         ->addColumn('date',function($single){

            $setting = DB::table('settings')->where('id', '1')->first();
            return date($setting->formatdate, strtotime($single->date));
        })
        ->rawColumns(['status','date'])
        ->make(true);
        
    }

    public function activityassetbyid( Request $request ) {
        $id            = $request->input( 'assetid' );

        $data = ActivityLogModel::where('activity_log.subject_id', $id)
            ->leftJoin('users', 'activity_log.causer_id', '=', 'users.id')
            ->select('activity_log.description as description',
                'activity_log.id as id',
                'users.fullname as user',
                'activity_log.properties as properties',
                'activity_log.created_at as date')
            ->orderBy('activity_log.id', 'desc')
            ->get();
            
        return Datatables::of($data)
        ->addColumn('properties',function($single){
            $row = "";

            $row = $row."<table class='table-sm'>";
            foreach (json_decode($single->properties) as $key => $value) {
                $row = $row."<tr><td style='width: 100px; max-width: 100px'>".htmlspecialchars($key) . "</td><td style='width: 500px; max-width: 500px'><b>" . htmlspecialchars($value) . "</b></td></tr>";
            }
            $row = $row."</table>";
            
            return $row;
        })
        ->rawColumns(['properties'])
        ->make(true);
        
    }

    /**
     * get single data by employee id for onhand
     * @param integer $id
     * @return object
     */

     public function onhandassetbyemployee( Request $request ) {
        $id            = $request->input( 'employeeid' );

      $data = DB::select("select asset_history.*, assets.name as assetname, assets.assettag as assettag, assets.serial as serial, count(asset_history.created_at)

        from asset_history left join assets  
        on asset_history.assetid = assets.id
        where asset_history.employeeid = '$id'
        group by asset_history.assetid
        order by asset_history.created_at desc"); 
        return Datatables::of($data)
        
        ->addColumn('status',function($single){
            if($single->status=='1'){
                $status = trans('lang.checkout');
            }
             if($single->status=='2'){
                $status = trans('lang.checkin');
            }
            return $status;
        })

         ->addColumn('date',function($single){

            $setting = DB::table('settings')->where('id', '1')->first();
            return date($setting->formatdate, strtotime($single->date));
        })
        ->rawColumns(['status','date'])
        ->make(true);
        
    }

    /**
     * get single data 
     * @param integer $id
     * @return object
     */

    public function byid( Request $request ) {
        $id            = $request->input( 'id' );

        $data = DB::table('assets')->select('assets.*','assets.name as assetname','assets.description as assetdescription', 'assets.created_at as assetcreated_at', 'assets.updated_at as assetupdated_at', 'assets.description as description', 'brand.*', 'brand.name as brand','asset_type.name as type','supplier.name as supplier','location.name as location')
        ->leftJoin('brand', 'brand.id', '=', 'assets.brandid')
        ->leftJoin('asset_type', 'asset_type.id', '=', 'assets.typeid')
        ->leftJoin('supplier', 'supplier.id', '=', 'assets.supplierid')
        ->leftJoin('location', 'location.id', '=', 'assets.locationid')
        ->where('assets.id',$id)
        ->first();
        
        if ( $data ) {

            //set status
            if($data->status=='1'){
                $status = trans('lang.readytodeploy');
            }
            if($data->status=='2'){
                $status = trans('lang.pending');
            }
            if($data->status=='3'){
                $status = trans('lang.archived');
            }
            if($data->status=='4'){
                $status = trans('lang.broken');
            }
            if($data->status=='5'){
                $status = trans('lang.lost');
            }
            if($data->status=='6'){
                $status = trans('lang.outofrepair');
            }

            //get date format setting
            $setting = DB::table('settings')->where('id', '1')->first();

            $assetemployee = DB::table('asset_history')
                ->select('employees.id as id', 'employees.fullname as fullname')
                ->leftJoin('employees', 'employees.id', '=', 'asset_history.employeeid')
                ->where('asset_history.assetid', $id)
                ->where('asset_history.status', 1)
                ->first();

            //for warranty
            $prchasedate = strtotime($data->purchasedate);
            $nextexpired = date($setting->formatdate, strtotime($data->warranty.' month', $prchasedate));

            $res['success'] = 'success';
            $res['message']= $data;
            $res['assetemployee']= $assetemployee;
            $res['assetcreated_at']= date($setting->formatdate, strtotime($data->assetcreated_at));
            $res['assetupdated_at']= date($setting->formatdate, strtotime($data->updated_at));
            $res['assetpurchasedate']= date($setting->formatdate, strtotime($data->purchasedate));
            $res['assetcost']= $setting->currency.$data->cost;
            $res['assetwarranty']= $data->warranty.' '.trans('lang.month').' - ('.$nextexpired.')';
            $res['assetstatus']= $status;
            $res['assetbarcode'] = '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($data->assettag, 'QRCODE', 10, 10, [0, 0, 0], [255, 255, 255]) . '" alt="barcode" width="90"  />';
            $res['assetbarcodemobile'] = '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($data->assettag, 'QRCODE', 10, 10, [0, 0, 0], [255, 255, 255]) . '" alt="barcode" width="120"  />';

            $res['assetimage']  = url('/').'/upload/assets/'.$data->picture;
        } else{
            $res['success'] = 'failed';
        }
        return response( $res );
        
    }


    /**
     * get single data where is not id
     * @return object
     */

    public function isnotbyid() {

        $data = DB::table("assets")->select('*')->whereNotIn('id',function($query) {
            $query->select('assetid')->from('depreciation')->whereNotNull('assetid');
         })->get();
        
        if ( $data ) {
            $res['success'] = 'success';
            $res['message']= $data;
        } else{
            $res['success'] = 'failed';
        }
        return response( $res );
        
    }


    /**
     * insert data  to database
     *
     * @param integer  $supplierid
     * @param integer  $typeid
     * @param integer  $brandid
     * @param string  $assettag
     * @param string  $name
     * @param string  $serial
     * @param string  $quantity
     * @param string  $purchasedate
     * @param string  $cost
     * @param string  $warranty
     * @param string  $status
     * @param string  $picture
     * @param string  $description
     * @return object
     */
    public function save(Request $request){
        $supplierid         = $request->input( 'supplierid' );
        $locationid         = $request->input( 'locationid' );
        $typeid             = $request->input( 'typeid' );
        $brandid             = $request->input( 'brandid' );
        $assettag           = $request->input( 'assettag' );
        $name               = $request->input( 'name' );
        $serial             = $request->input( 'serial' );
        $quantity           = $request->input( 'quantity' );
        $purchasedate       = $request->input( 'purchasedate' );
        $cost               = $request->input( 'cost' );
        $warranty           = $request->input( 'warranty' );
        $status             = $request->input( 'status' );
        $checkstatus        = 0;
        $picture            = $request->file( 'picture' );
        $description        = $request->input( 'description' );
        $defaultimage       = 'pic.png';
        $created_at         = date("Y-m-d H:i:s");
        $updated_at         = date("Y-m-d H:i:s");
        $message = ['picture.mimes'=>trans('lang.upload_error')];

        $emailcheck = DB::table('assets')
        ->where('assettag', '=', $assettag)
        ->first();
    
        if($emailcheck){
            $res['message'] = 'exist';  
        }
        else{ 
      
            if($request->hasFile('picture')) {
                $this->validate($request, ['picture' => 'mimes:jpeg,png,jpg|max:'.DB::table('settings')->where('id', '1')->first()->imagesize],$message);
                $picturename  = date('mdYHis').uniqid().$request->file('picture')->getClientOriginalName();
                $request->file('picture')->move(public_path("/upload/assets"), $picturename);

                $data       = array('name'=>$name, 
                            'locationid'=>$locationid,
                            'supplierid'=>$supplierid,
                            'brandid'=>$brandid,
                            'typeid'=>$typeid,
                            'assettag'=>$assettag,
                            'serial'=>$serial,
                            'quantity'=>$quantity,
                            'purchasedate'=>$purchasedate,
                            'checkstatus'=>0,
                            'cost'=>$cost,
                            'warranty'=>$warranty,
                            'status'=>$status,
                            'picture'=>$picturename,
                            'description'=>$description,
                            'created_at'=>$created_at,
                            'updated_at'=>$updated_at);
                $insert     = AssetsModel::create( $data ); 

            }else{
                $data       = array('name'=>$name, 
                                'locationid'=>$locationid,
                                'supplierid'=>$supplierid,
                                'typeid'=>$typeid,
                                'brandid'=>$brandid,
                                'assettag'=>$assettag,
                                'serial'=>$serial,
                                'quantity'=>$quantity,
                                'purchasedate'=>$purchasedate,
                                'cost'=>$cost,
                                'checkstatus'=>0,
                                'warranty'=>$warranty,
                                'status'=>$status,
                                'picture'=>$defaultimage,
                                'description'=>$description,
                                'created_at'=>$created_at,
                                'updated_at'=>$updated_at);

                $insert     = AssetsModel::create( $data ); 

            }

            if ( $insert ) {
                $res['message'] = 'success';

                ActivityLogModel::create([
                    'log_name' => 'assets',
                    'description' => 'created',
                    'subject_id' => $insert->id,
                    'causer_id' => Auth::user()->id,
                    'properties' => json_encode((object) $data),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            } else{
                $res['message'] = 'failed';
            }
        }
        return response( $res );
    }

    /**
     * update data  to database
     *
     * @param string  $fullname
     * @param string  $email
     * @param string  $picture
     * @param string  $gender
     * @param string  $city
     * @param string  $country
     * @param string  $phone
     * @return object
     */
    public function update(Request $request){
        $id             = $request->input( 'id' );
        $locationid     = $request->input( 'locationid' );
        $supplierid     = $request->input( 'supplierid' );
        $typeid         = $request->input( 'typeid' );
        $brandid        = $request->input( 'brandid' );
        $assettag       = $request->input( 'assettag' );
        $name           = $request->input( 'name' );
        $serial         = $request->input( 'serial' );
        $quantity       = $request->input( 'quantity' );
        $purchasedate   = $request->input( 'purchasedate' );
        $cost           = $request->input( 'cost' );
        $warranty       = $request->input( 'warranty' );
        $status         = $request->input( 'status' );
        $picture        = $request->file( 'picture' );
        $description    = $request->input( 'description' );
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");
        $message = ['picture.mimes'=>trans('lang.upload_error')];

        $tagcheck = DB::table('assets')
        ->where('assettag', '=', $assettag)
        ->where('id', '!=', $id)
        ->first();
    
        if($tagcheck){
            $res['message'] = 'exist';  
        }
        else{ 

            if($request->hasFile('picture')) {
                $this->validate($request, ['picture' => 'mimes:jpeg,png,jpg|max:'.DB::table('settings')->where('id', '1')->first()->imagesize],$message);
                $picturename  = date('mdYHis').uniqid().$request->file('picture')->getClientOriginalName();
                $request->file('picture')->move(public_path("/upload/assets"), $picturename);

                $updatearr = [
                    'name'                => $name,
                    'locationid'          => $locationid,    
                    'supplierid'          => $supplierid,
                    'brandid'             => $brandid,
                    'typeid'              => $typeid,
                    'assettag'            => $assettag,
                    'serial'              => $serial,
                    'quantity'            => $quantity,
                    'purchasedate'        => $purchasedate,
                    'cost'                => $cost,
                    'warranty'            => $warranty,
                    'status'              => $status,
                    'description'         => $description,
                    'picture'             => $picturename,
                    'updated_at'          => $updated_at
                ];

                $update = DB::table( 'assets' )->where( 'id', $id )
                ->update($updatearr);
            }else{
                $updatearr = [
                    'name'                => $name,
                    'locationid'          => $locationid,
                    'supplierid'          => $supplierid,
                    'brandid'             => $brandid,
                    'typeid'              => $typeid,
                    'assettag'            => $assettag,
                    'serial'              => $serial,
                    'quantity'            => $quantity,
                    'purchasedate'        => $purchasedate,
                    'cost'                => $cost,
                    'warranty'            => $warranty,
                    'status'              => $status,
                    'description'         => $description,
                    'updated_at'          => $updated_at
                ];

                $update = DB::table( 'assets' )->where( 'id', $id )
                ->update($updatearr);
            }

            if ( $update ) {
                $res['message'] = 'success';

                ActivityLogModel::create([
                    'log_name' => 'assets',
                    'description' => 'edited',
                    'subject_id' => $id,
                    'causer_id' => Auth::user()->id,
                    'properties' => json_encode((object) $updatearr),
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
                
            } else{
                $res['message'] = 'failed';
            }
        }
        return response( $res );
    }

    /**
     * insert checkout data  to database
     *
     * @param integer  $assetid
     * @param integer  $employeeid
     * @param string  $date
     * @param integer  $status
     * @return object
     */
    public function savecheckout(Request $request){
        $assetid        = $request->input( 'assetid' );
        $employeeid     = $request->input( 'employeeid' );
        $userid         = Auth::user()->id;
        $date           = $request->input( 'checkoutdate' );
        $status         = '1'; //checkout = 1
        $checkstatus    = '2'; 
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");
        $data           = array(
            'assetid'=>$assetid,
            'status'=>$status,
            'employeeid'=>$employeeid,
            'userid'=>$userid,
            'date'=>$date,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at
        );
        $insert         = DB::table( 'asset_history' )->insert( $data );

        if ( $insert ) {

            //set status in table asset
            $update = DB::table( 'assets' )->where( 'id', $assetid )
            ->update(
                [
                    'checkstatus'         => $checkstatus,
                    'updated_at'          => $updated_at
                ]
            );

            $res['success'] = 'success';
        } else{
            $res['success'] = 'failed';
        }
        
        return response( $res );
    }

    /**
     * insert checkin data  to database
     *
     * @param integer  $assetid
     * @param integer  $employeeid
     * @param string  $date
     * @param integer  $status
     * @return object
     */
    public function savecheckin(Request $request){
        $assetid        = $request->input( 'assetid' );
        $employeeid     = $request->input( 'employeeid' );
        $userid         = Auth::user()->id;
        $date           = $request->input( 'checkindate' );
        $status         = '2'; //checkout = 1
        $checkstatus    = '0'; 
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");
        $data           = array(
            'assetid'=>$assetid,
            'status'=>$status,
            'employeeid'=>$employeeid,
            'userid'=>$userid,
            'date'=>$date,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at
        );
        $insert         = DB::table( 'asset_history' )->insert( $data );

        if ( $insert ) {
            //set status in table asset
            $update = DB::table( 'assets' )->where( 'id', $assetid )
            ->update(
                [
                    'checkstatus'         => $checkstatus,
                    'updated_at'          => $updated_at
                ]
            );
            $res['success'] = 'success';
        } else{
            $res['success'] = 'failed';
        }
        
        return response( $res );
    }

    /**
     * get all  from database
     * @return object
     */
    public function getrows(){
        $data = DB::table('assets')->get();
        if ( $data ) {
            $res['success'] = true;
            $res['message']= $data;
        }
        return response( $res );
    }


     /**
     * delete to database
     *
     * @param integer $id
     * @return object
     */

    public function delete( Request $request ) {
        $id = $request->input( 'id' );
        $getfilename = DB::table('assets')
        ->where('id', '=', $id)
        ->first();

        $delete = DB::table( 'assets' )->where( 'id', $id )->delete();
        $notdefaultimage = 'pic.png';
        $filename = $getfilename->picture;

        if($filename != $notdefaultimage){
            $deleteimage = File::delete('upload/assets/'.$getfilename->picture);
        }

                if ( $delete ) {
                    $res['success'] = 'success';
                } else{
                    $res['success'] = 'failed';
                }
            return response( $res );
        
    }
    

    /**
     * Generate Product Code
     *
     * @return object
     */

    public function generateproductcode() {
        $lastid = DB::table('assets')->orderBy('id', 'desc')->first();
    
        if ( $lastid ) {
            $res['success'] = 'success';
            $res['message']=  'AST'.date('ymd').$lastid->id;
        } else{
            $res['message']=  'AST'.date('ymd').'1';
        }
        return response( $res );
    }
}
