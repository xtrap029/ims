<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\TraitSettings;
use DB;
use App;
use Auth;

class RoleManagement extends Controller
{
    use TraitSettings;

    public function __construct() {
		
		$data = $this->getapplications();
		$lang = $data->language;
		App::setLocale($lang);
        $this->middleware('auth');
    }

    public function index() {
		return view( 'rolemanagement.index' );
    }
}
