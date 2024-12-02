<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\TraitSettings;
use DB;
use App\User;
use App;
use Auth;

class UserType extends Controller
{
    use TraitSettings;

    public function __construct() {
		
		$data = $this->getapplications();
		$lang = $data->language;
		App::setLocale($lang);
        $this->middleware('auth');
    }

    //return view
    public function index() {
		return view( 'usertype.index' );
    }

    /**
	 * get data from database
	 * @return object
	 */
    public function getdata(){
        $data = DB::table('user_type')->whereNull('deleted_at')->select(['user_type.*'])->orderBy('order', 'asc');
		return Datatables::of($data)
        ->addColumn( 'action', function ( $accountsingle ) {
            return '<a href="#" id="btnedit" customdata='.$accountsingle->id.' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> '. trans('lang.edit').'</a>';
        } )
        ->rawColumns(['action'])
        ->make( true );		
    }

    /**
	 * get all  from database
	 * @return object
	 */
    public function getrows(){
        $data = DB::table('user_type')->get();
        if ( $data ) {
			$res['success'] = true;
			$res['message'] = $data;
        }
        return response( $res );
    }

    /**
	 * get single data 
	 * @param integer $id
	 * @return object
	 */

    public function byid( Request $request ) {
        $id            = $request->input( 'id' );

        $data = DB::table('user_type')->where('id', $id)->first();
        
        if ( $data ) {
			$res['success'] = 'success';
			$res['message']= $data;
        } else{
            $res['success'] = 'failed';
        }
        return response( $res );
        
    }

    /**
	 * update data  to database
	 *
	 * @param string  $name
     * @param string  $order
	 * @return object
	 */
    public function update(Request $request){
        $id             = $request->input( 'id' );
        $code           = $request->input( 'code' );
        $name           = $request->input( 'name' );
        $order    = $request->input( 'order' );
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");

		$update = DB::table( 'user_type' )->where( 'id', $id )
		->update(
			[
			'name'          => $name,
            'order'         => $order,
            'code'         => $code,
            'updated_at'    => $updated_at
			]
		);
        
        if ( $update ) {
			$res['success'] = 'success';
			
        } else{
            $res['success'] = 'failed';
        }

        return response( $res );
    }
}
