<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\TraitSettings;
use DB;
use Carbon\Carbon;
use App\User;
use App\AssetsModel;
use App;
use Auth;

class Home extends Controller
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
		$url = "https://api.trello.com/1/lists/".env('TRELLO_INPROGRESS')."/cards?fields=name,shortUrl,dateLastActivity&key=".env('TRELLO_KEY')."&token=".env('TRELLO_TOKEN');
		$response = file_get_contents($url);
		$data = json_decode($response, true);

		$cards_inprogress = array();
		foreach ($data as $key => $value) {
			$cards_inprogress[] = array(
				'name' => $value['name'],
				'url' => $value['shortUrl'],
				'date' => Carbon::parse($value['dateLastActivity'])->diffForHumans(),
			);
		}

		$url = "https://api.trello.com/1/lists/".env('TRELLO_STAGING')."/cards?fields=name,shortUrl,dateLastActivity&key=".env('TRELLO_KEY')."&token=".env('TRELLO_TOKEN');
		$response = file_get_contents($url);
		$data = json_decode($response, true);

		$cards_staging = array();
		foreach ($data as $key => $value) {
			$cards_staging[] = array(
				'name' => $value['name'],
				'url' => $value['shortUrl'],
				'date' => Carbon::parse($value['dateLastActivity'])->diffForHumans(),
			);
		}

		$url = "https://api.trello.com/1/lists/".env('TRELLO_PRODUCTION')."/cards?fields=name,shortUrl,dateLastActivity&key=".env('TRELLO_KEY')."&token=".env('TRELLO_TOKEN');
		$response = file_get_contents($url);
		$data = json_decode($response, true);

		$cards_production = array();
		foreach ($data as $key => $value) {
			$cards_production[] = array(
				'name' => $value['name'],
				'url' => $value['shortUrl'],
				'date' => Carbon::parse($value['dateLastActivity'])->diffForHumans(),
			);
		}

		return view( 'home.index' )->with([
			'cards_inprogress' => $cards_inprogress,
			'cards_staging' => $cards_staging,
			'cards_production' => $cards_production,
		]);
    }


	/**
	 * Show total balance.
	 *
	 * @return object
	 */
	public function totalbalance() {

		$totalasset   = DB::table('assets')
		->select(DB::raw('count(*) as totalasset'))
		->first();

		$totalcomponent   = DB::table('component')
		->select(DB::raw('sum(quantity) as totalcomponent'))
		->first();

		$totalmaintenance   = DB::table('maintenance')
		->select(DB::raw('count(*) as totalmaintenance'))
		->first();

		$totalemployee   = DB::table('employees')
		->select(DB::raw('count(*) as totalemployee'))
		->first();

		$data['totalasset'] 		= $totalasset->totalasset;
		$data['totalcomponent'] 	= $totalcomponent->totalcomponent;
		$data['totalemployee'] 		= $totalemployee->totalemployee;
		$data['totalmaintenance'] 	= $totalmaintenance->totalmaintenance;

		return response($data);
	}


	/**
	 * Show asset by type
	 *
	 * @return object
	 */
	public function assetbytype() {

		$data = DB::table('assets')
		->leftJoin('asset_type', 'asset_type.id', '=', 'assets.typeid')
		->select(DB::raw('count(*) as amount, asset_type.name as type'))
		->groupBy('asset_type.id')
		->groupBy('asset_type.name')
		->get();
		return response($data);
	}

	/**
	 * Show asset by status
	 *
	 * @return object
	 */
	public function assetbystatus() {

		$data= AssetsModel::groupBy('status')->select('status', DB::raw('count(*) as amount'))->get();

		return response($data);
	}


	/**
	 * get data recent asset from database
	 * @return object
	 */
    public function recentassetactivity(){
        $data = DB::table('asset_history')
        ->select('asset_history.*', 'assets.name as asset', 'employees.fullname as employees', 'asset_type.name as type', 'location.name as location')
        ->leftJoin('assets', 'assets.id', '=', 'asset_history.assetid')
        ->leftJoin('asset_type', 'assets.typeid', '=', 'asset_type.id')
        ->leftJoin('employees', 'employees.id', '=', 'asset_history.employeeid')
        ->leftJoin('location', 'location.id', '=', 'assets.locationid')
        ->offset(0)->limit(10)
		->orderBy('asset_history.updated_at', 'desc')
		->orderBy('asset_history.created_at', 'desc')
		->get();

        return Datatables::of($data)
        
        ->addColumn( 'status', function ( $accountsingle ) {
           

            if($accountsingle->status==2){
                    
                    $status = '<span class="badge badge-data text-white background-blue">'.trans('lang.checkin').'</span>';
                
            }else{
                    $status = '<span class="badge badge-data text-white background-yellow">'.trans('lang.checkout').'</span>';
            }

            return  $status;
           
        } )->rawColumns(['status'])
        ->make(true);		
    }

    /**
	 * get data recent component from database
	 * @return object
	 */
    public function recentcomponentactivity(){
        $data = DB::table('component_assets')
        ->select('component_assets.*', 'component.name as component','assets.name as asset', 'asset_type.name as type', 'location.name as location')
        ->leftJoin('assets', 'assets.id', '=', 'component_assets.assetid')
        ->leftJoin('asset_type', 'assets.typeid', '=', 'asset_type.id')
        ->leftJoin('location', 'location.id', '=', 'assets.locationid')
        ->leftJoin('component', 'component.id', '=', 'component_assets.componentid')
        ->offset(0)->limit(10)
		->orderBy('component_assets.updated_at', 'desc')
		->orderBy('component_assets.created_at', 'desc')
		->get();

        return Datatables::of($data)
        
        ->addColumn( 'status', function ( $accountsingle ) {
           

            if($accountsingle->status==2){
                    
                    $status = '<span class="badge badge-data text-white background-blue">'.trans('lang.checkin').'</span>';
                
            }else{
                    $status = '<span class="badge badge-data text-white background-yellow">'.trans('lang.checkout').'</span>';
            }

            return  $status;
           
        } )->rawColumns(['status'])
        ->make(true);		
    }
}

