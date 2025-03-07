<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Home@index');
Route::get('/home','Home@index');
Route::get('/brandlist','Brand@index')->middleware('auth', 'checkAccess:BRANDS');
Route::get('/departmentlist','Department@index');
Route::get('/assettypelist','AssetType@index')->middleware('auth', 'checkAccess:ASSETTYPES');
Route::get('/locationlist','Location@index');
Route::get('/statuslist','Status@index');
Route::get('/assetstatuslist','AssetStatus@index');
Route::get('/previouslyinstalledlist','PreviouslyInstalled@index');
Route::get('/employeeslist','Employees@index');
Route::get('/employeeslist/detail/{id}','Employees@detail');
Route::get('/supplierlist','Supplier@index')->middleware('auth', 'checkAccess:SUPPLIERS');
Route::get('/userlist','User@index');
Route::get('/usertypelist','UserType@index');
Route::get('/useraccesslist','UserAccess@index');
Route::get('/rolemanagement','RoleManagement@index');
Route::get('/settinglist','Settings@index');

Route::get('/assetlist','Asset@index')->middleware('auth', 'checkAccess:ASSETS');
Route::get('/assetlist/detail/{id}','Asset@detail')->name('assetDetail')->middleware('auth', 'checkAccess:ASSETS_DETAIL');
Route::get('/assetlist/generatelabel/{id}', 'Asset@generatelabel')->middleware('auth', 'checkAccess:ASSETS_DETAIL');

Route::get('/componentlist','Component@index');
Route::get('/componentlist/detail/{componentid}','Component@detail');
Route::get('/maintenancelist','Maintenance@index')->middleware('auth', 'checkAccess:MAINTENANCES');
Route::get('/depreciationlist','Depreciation@index')->middleware('auth', 'checkAccess:DEPRECIATIONS');

Route::get('/csv', 'Asset@csv')->name('csv');
Route::post('/csv', 'Asset@csvUpload');


//report
Route::get('/reports/assetactivity','Reports@assetactivity')->name('report');
Route::get('/reports/componentactivity','Reports@componentactivity')->name('report');
Route::get('/reports/maintenance','Reports@maintenance')->name('report');
Route::get('/reports/bytype','Reports@bytype')->name('report');
Route::get('/reports/bystatus','Reports@bystatus')->name('report');
Route::get('/reports/bylocation','Reports@bylocation')->name('report');
Route::get('/reports/bysupplier','Reports@bysupplier')->name('report');
Route::get('/reports/allreports','Reports@allreports')->name('report');

Route::get('logout', 'Auth\LoginController@logout');

//login
Route::get('logout', 'Auth\LoginController@logout');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::get('login/getapplication','Auth\LoginController@getapplication');
Route::post('login', 'Auth\LoginController@authenticate');
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@authenticate']);


//Home API
Route::get('home/totalbalance', 'Home@totalbalance');
Route::get('home/assetbytype', 'Home@assetbytype');
Route::get('home/assetbystatus', 'Home@assetbystatus');
Route::get('home/recentassetactivity', 'Home@recentassetactivity');
Route::get('home/recentcomponentactivity', 'Home@recentcomponentactivity');

//Brand API
Route::get('brand', 'Brand@getdata')->middleware('auth', 'checkAccess:BRANDS');
Route::get('listbrand', 'Brand@getrows')->middleware('auth', 'checkAccess:BRANDS');
Route::post('savebrand', 'Brand@save')->middleware('auth', 'checkAccess:BRANDS_ADD');
Route::post('updatebrand', 'Brand@update')->middleware('auth', 'checkAccess:BRANDS_EDIT');
Route::post('deletebrand', 'Brand@delete')->middleware('auth', 'checkAccess:BRANDS_DELETE');
Route::post('brandbyid', 'Brand@byid')->middleware('auth', 'checkAccess:BRANDS_EDIT');

//Department API
Route::get('department', 'Department@getdata');
Route::get('listdepartment', 'Department@getrows');
Route::post('savedepartment', 'Department@save');
Route::post('updatedepartment', 'Department@update');
Route::post('deletedepartment', 'Department@delete');
Route::post('departmentbyid', 'Department@byid');

//Asset Type API
Route::get('assettype', 'AssetType@getdata')->middleware('auth', 'checkAccess:ASSETTYPES');
Route::get('listassettype', 'AssetType@getrows')->middleware('auth', 'checkAccess:ASSETTYPES');
Route::post('saveassettype', 'AssetType@save')->middleware('auth', 'checkAccess:ASSETTYPES_ADD');
Route::post('updateassettype', 'AssetType@update')->middleware('auth', 'checkAccess:ASSETTYPES_EDIT');
Route::post('deleteassettype', 'AssetType@delete')->middleware('auth', 'checkAccess:ASSETTYPES_DELETE');
Route::post('assettypebyid', 'AssetType@byid')->middleware('auth', 'checkAccess:ASSETTYPES_EDIT');

//Location API
Route::get('location', 'Location@getdata');
Route::get('listlocation', 'Location@getrows');
Route::post('savelocation', 'Location@save');
Route::post('updatelocation', 'Location@update');
Route::post('deletelocation', 'Location@delete');
Route::post('locationbyid', 'Location@byid');

//Status API
Route::get('status', 'Status@getdata');
Route::get('liststatus', 'Status@getrows');
Route::post('savestatus', 'Status@save');
Route::post('updatestatus', 'Status@update');
Route::post('deletestatus', 'Status@delete');
Route::post('statusbyid', 'Status@byid');

//Asset Status API
Route::get('assetstatus', 'AssetStatus@getdata');
Route::get('listassetstatus', 'AssetStatus@getrows');
Route::post('saveassetstatus', 'AssetStatus@save');
Route::post('updateassetstatus', 'AssetStatus@update');
Route::post('deleteassetstatus', 'AssetStatus@delete');
Route::post('assetstatusbyid', 'AssetStatus@byid');

//Previously Installed API
Route::get('previouslyinstalled', 'PreviouslyInstalled@getdata');
Route::get('listpreviouslyinstalled', 'PreviouslyInstalled@getrows');
Route::post('savepreviouslyinstalled', 'PreviouslyInstalled@save');
Route::post('updatepreviouslyinstalled', 'PreviouslyInstalled@update');
Route::post('deletepreviouslyinstalled', 'PreviouslyInstalled@delete');
Route::post('previouslyinstalledbyid', 'PreviouslyInstalled@byid');

//User Type API
Route::get('usertype', 'UserType@getdata');
Route::get('listusertype', 'UserType@getrows');
Route::post('updateusertype', 'UserType@update');
Route::post('usertypebyid', 'UserType@byid');
Route::get('usertype/access/{id}', 'UserType@access')->name('usertype');
Route::post('usertype/access/{id}', 'UserType@updateaccess');

//User Access API
Route::get('useraccess', 'UserAccess@getdata');
Route::get('listuseraccess', 'UserAccess@getrows');
Route::post('updateuseraccess', 'UserAccess@update');
Route::post('useraccessbyid', 'UserAccess@byid');

//Employees API
Route::get('employees', 'Employees@getdata');
Route::get('listemployees', 'Employees@getrows');
Route::post('saveemployees', 'Employees@save');
Route::post('updateemployees', 'Employees@update');
Route::post('deleteemployees', 'Employees@delete');
Route::post('employeesbyid', 'Employees@byid');

//Supplier API
Route::get('supplier', 'Supplier@getdata')->middleware('auth', 'checkAccess:SUPPLIERS');
Route::get('listsupplier', 'Supplier@getrows')->middleware('auth', 'checkAccess:SUPPLIERS');
Route::post('savesupplier', 'Supplier@save')->middleware('auth', 'checkAccess:SUPPLIERS_ADD');
Route::post('updatesupplier', 'Supplier@update')->middleware('auth', 'checkAccess:SUPPLIERS_EDIT');
Route::post('deletesupplier', 'Supplier@delete')->middleware('auth', 'checkAccess:SUPPLIERS_DELETE');
Route::post('supplierbyid', 'Supplier@byid')->middleware('auth', 'checkAccess:SUPPLIERS_EDIT');

//User API
Route::get('user', 'User@getdata');
Route::get('listuser', 'User@getrows');
Route::post('saveuser', 'User@save');
Route::post('updateuser', 'User@update');
Route::post('deleteuser', 'User@delete');
Route::post('userbyid', 'User@byid');

//Settings API
Route::get('settings', 'Settings@getdata');
Route::post('updatesettings', 'Settings@update');
Route::get('exportdatabase', 'Settings@exportdatabase');

Route::get('asset', 'Asset@getData')->middleware('auth', 'checkAccess:ASSETS');

Route::get('listasset', 'Asset@getrows');
Route::post('saveasset', 'Asset@save')->middleware('auth', 'checkAccess:ASSETS_ADD');
Route::post('updateasset', 'Asset@update')->middleware('auth', 'checkAccess:ASSETS_EDIT');
Route::post('deleteasset', 'Asset@delete')->middleware('auth', 'checkAccess:ASSETS_DELETE');
Route::post('assetbyid', 'Asset@byid')->middleware('auth', 'checkAccess:ASSETS_DETAIL');
Route::post('savecheckout', 'Asset@savecheckout')->middleware('auth', 'checkAccess:ASSETS_CHECKIN');
Route::post('savecheckin', 'Asset@savecheckin')->middleware('auth', 'checkAccess:ASSETS_CHECKIN');

Route::post('historyassetbyid', 'Asset@historyassetbyid')->middleware('auth', 'checkAccess:ASSETS_DETAIL_HISTORY');

Route::post('historyassetbyemployee', 'Asset@historyassetbyemployee');
Route::post('activityassetbyid', 'Asset@activityassetbyid')->middleware('auth', 'checkAccess:ASSETS_DETAIL_ACTIVITY_LOG');
Route::post('onhandassetbyemployee', 'Asset@onhandassetbyemployee');
Route::get('asset/generateproductcode', 'Asset@generateproductcode');
Route::get('assetnotbyid', 'Asset@isnotbyid');
Route::get('scan', 'Asset@scan');

//Component API
Route::get('component', 'Component@getdata');
Route::get('listcomponent', 'Component@getrows');
Route::post('savecomponent', 'Component@save');
Route::post('updatecomponent', 'Component@update');
Route::post('deletecomponent', 'Component@delete');
Route::post('savecheckoutcomponent', 'Component@savecheckout');
Route::post('savecheckincomponent', 'Component@savecheckin');
Route::post('componentbyid', 'Component@byid');
Route::post('singlehistorycomponentbyid', 'Component@singlehistorycomponentbyid');
Route::get('component/generateproductcode', 'Component@generateproductcode');
Route::post('componentassetbyid', 'Component@assetsbyid');
Route::post('historycomponentbyid', 'Component@historycomponentbyid');
Route::get('componentnotbyid', 'Component@isnotbyid');

//Maintenance API
Route::get('maintenance', 'Maintenance@getdata')->middleware('auth', 'checkAccess:MAINTENANCES');
Route::get('listmaintenance', 'Maintenance@getrows')->middleware('auth', 'checkAccess:MAINTENANCES');
Route::post('savemaintenance', 'Maintenance@save')->middleware('auth', 'checkAccess:MAINTENANCES_ADD');
Route::post('updatemaintenance', 'Maintenance@update')->middleware('auth', 'checkAccess:MAINTENANCES_EDIT');
Route::post('deletemaintenance', 'Maintenance@delete')->middleware('auth', 'checkAccess:MAINTENANCES_DELETE');
Route::post('maintenancebyid', 'Maintenance@byid')->middleware('auth', 'checkAccess:MAINTENANCES_EDIT');
Route::post('maintenanceassetsbyid', 'Maintenance@assetsbyid')->middleware('auth', 'checkAccess:ASSETS_DETAIL_MAINTENANCES');

//File API
Route::post('fileassetgallerybyid', 'FileData@getdataasetgallery')->middleware('auth', 'checkAccess:ASSETS_DETAIL_GALLERY');
Route::post('filecomponentbyid', 'FileData@getdatacomponent')->middleware('auth', 'checkAccess:ASSETS_DETAIL_COMPONENTS');
Route::post('fileassetsbyid', 'FileData@getdataaset')->middleware('auth', 'checkAccess:ASSETS_DETAIL_FILE');

Route::post('fileemployeebyid', 'FileData@getdataemployee');
Route::post('savefile', 'FileData@save');
Route::post('deletefile', 'FileData@delete');

//Depreciation API
Route::get('depreciation', 'Depreciation@getdata')->middleware('auth', 'checkAccess:DEPRECIATIONS');
Route::get('listdepreciation', 'Depreciation@getrows')->middleware('auth', 'checkAccess:DEPRECIATIONS');
Route::post('savedepreciation', 'Depreciation@save')->middleware('auth', 'checkAccess:DEPRECIATIONS_ADD');
Route::post('updatedepreciation', 'Depreciation@update')->middleware('auth', 'checkAccess:DEPRECIATIONS_EDIT');
Route::post('deletedepreciation', 'Depreciation@delete')->middleware('auth', 'checkAccess:DEPRECIATIONS_DELETE');
Route::post('depreciationbyid', 'Depreciation@byid')->middleware('auth', 'checkAccess:DEPRECIATIONS_EDIT');
Route::post('depreciationvaluebyid', 'Depreciation@calculator');
Route::post('componentdepreciationvaluebyid', 'Depreciation@calculatorcomponent');

//Report API
Route::get('listassetactivityreport', 'Reports@getassetactivityreport');
Route::get('listcomponentactivityreport', 'Reports@getcomponentactivityreport');
Route::get('getdatabytypereport', 'Reports@getdatabytypereport');
Route::get('getdatabystatusreport', 'Reports@getdatabystatusreport');
Route::get('getdatabysupplierreport', 'Reports@getdatabysupplierreport');
Route::get('getdatabylocationreport', 'Reports@getdatabylocationreport');