<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusModel;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\TraitSettings;
use DB;
use App\User;
use App;
use Auth;

class Status extends Controller
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
		return view( 'status.index' );
    }

    /**
	 * get data from database
	 * @return object
	 */
    public function getdata(){
        $data = DB::table('status')->whereNull('deleted_at')->select(['status.*'])->orderBy('order', 'asc');
		return Datatables::of($data)
		->addColumn( 'name', function ( $accountsingle ) {
            return '<label class="badge badge-pill badge-'.$accountsingle->color.' text-white">'.$accountsingle->name.'</label>';
        } )
        ->addColumn( 'action', function ( $accountsingle ) {
            return '<a href="#" id="btnedit" customdata='.$accountsingle->id.' class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> '. trans('lang.edit').'</a>
                    <a href="#" id="btndelete" customdata='.$accountsingle->id.' class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> '. trans('lang.delete').'</a>';
        } )
        ->rawColumns(['name', 'action'])
        ->make( true );		
    }

    /**
	 * get all  from database
	 * @return object
	 */
    public function getrows(){
        $data = DB::table('status')->get();
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

        $data = DB::table('status')->where('id', $id)->first();
        
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
	 * @param string  $name
     * @param string  $order
	 * @return object
	 */
    public function save(Request $request){
        $name           = $request->input( 'name' );
        $order          = $request->input( 'order' );
        $color          = $request->input( 'color' );
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");
        $data           = array('name'=>$name, 'color'=>$color, 'order'=>$order,'created_at'=>$created_at, 'updated_at'=>$updated_at);
		$insert         = DB::table( 'status' )->insert( $data );

		if ( $insert ) {
			$res['success'] = 'success';
			
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
        $name           = $request->input( 'name' );
        $order    = $request->input( 'order' );
        $color    = $request->input( 'color' );
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");

		$update = DB::table( 'status' )->where( 'id', $id )
		->update(
			[
			'name'          => $name,
            'order'         => $order,
            'color'         => $color,
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

     /**
	 * delete to database
	 *
	 * @param integer $id
	 * @return object
	 */

	public function delete( Request $request ) {
		$id = $request->input( 'id' );
		$delete = DB::table( 'status' )->where( 'id', $id )->update(
			[
            'deleted_at'    => date("Y-m-d H:i:s")
			]
		);;
            if ( $delete ) {
                $res['success'] = 'success';
            } else{
                $res['success'] = 'failed';
            }
		return response( $res );
	}
}
