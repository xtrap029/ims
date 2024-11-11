<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SettingModel;
use App\Http\Controllers\TraitSettings;
use DB;
use App;
use Auth;
use Carbon\Carbon;

class Settings extends Controller
{
    use TraitSettings;

	public function __construct() {
		$data = $this->getapplications();
		$lang = $data->language;
		App::setLocale($lang);
		$this->middleware( 'auth' );
	}
	

	 //return settings
	 public function index() {
		return view( 'setting.index' );
    }
    
    /**
	 * get application settings
	 *
	 * @return object
	 */
	public function getdata() {
		$data = DB::table('settings')->where('id', '1')->first();
		if ($data) {
			$res['success'] = true;
			$res['data']  = $data;
			$res['logo']  = url('/').'/upload/'.$data->logo;
			$res['loginbanner']  = url('/').'/upload/'.$data->loginbanner;
			$res['message'] = 'success';
			return response($res);
		}
    }
    

    /**
	 * update application settings to database
	 *
	 * @param string  $company
	 * @param string  $phone
	 * @param string  $city
	 * @param string  $website
	 * @param string  $address
	 * @param string  $currency
	 * @param string  $language
	 * @param string  $dateformat
	 * @return object
	 */
	public function update(Request $request){
        $company      = $request->input('company');
        $address      = $request->input('address');
		$email       = $request->input('email');
		$phonenumber = $request->input('phonenumber');
        $country    = $request->input('country');
		$currency   = $request->input('currency');
		$language   = $request->input('language');
		$imagesize   = $request->input('imagesize');
		$formatdate = $request->input('formatdate');

		if ($request->hasFile('logo') || $request->hasFile('loginbanner')) {
			$savedata = [
				'company'       =>$company,
				'address'       =>$address,
				'email'         =>$email,
				'phonenumber'   =>$phonenumber,
				'country'   	=>$country,
				'currency'      =>$currency,
				'language'      =>$language,
				'imagesize'      =>$imagesize,
				'formatdate'    =>$formatdate
			];

			if ($request->hasFile('logo')) {
				$this->validate($request, [
					'logo' => 'mimes:jpeg,png,jpg|max:2048'
				]);
				$logoname  = $request->file('logo')->getClientOriginalName();
				$request->file('logo')->move(public_path("/upload"), $logoname);

				$savedata['logo'] = $logoname;
			}

			if ($request->hasFile('loginbanner')) {
				$this->validate($request, [
					'loginbanner' => 'mimes:jpeg,png,jpg|max:2048'
					]);
				$loginbanner  = $request->file('loginbanner')->getClientOriginalName();
				$request->file('loginbanner')->move(public_path("/upload"), $loginbanner);

				$savedata['loginbanner'] = $loginbanner;
			}

			$update = DB::table('settings')->where('id', '1')->update($savedata);
		} else{

			$update = DB::table('settings')->where('id', '1')->update(
				[
                    'company'       =>$company,
                    'address'       =>$address,
                    'email'         =>$email,
                    'phonenumber'   =>$phonenumber,
                    'country'   	=>$country,
                    'currency'      =>$currency,
                    'language'      =>$language,
                    'imagesize'      =>$imagesize,
                    'formatdate'    =>$formatdate
				]
			);
		}

		if ( $update ) {
			$res['message'] = 'success';
			
        } else{
            $res['message'] = 'failed';
        }

        return response( $res );


	}

	public function exportdatabase() {
		$filename = Carbon::now()->format('Y-m-d') . "-" . substr(md5(mt_rand()), 0, 7) . ".gz";

        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password='" . env('DB_PASSWORD') . "' --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . public_path("upload/temp/") . $filename;
  
        $returnVar = NULL;
        $output  = NULL;
  
        exec($command, $output, $returnVar);

		return response()->download(public_path("upload/temp/") . $filename)->deleteFileAfterSend(true);
	}

}
