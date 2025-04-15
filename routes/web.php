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
Route::get('/departmentlist','Department@index')->middleware('auth', 'checkAccess:DEPARTMENTS');
Route::get('/assettypelist','AssetType@index')->middleware('auth', 'checkAccess:ASSETTYPES');
Route::get('/locationlist','Location@index')->middleware('auth', 'checkAccess:LOCATIONS');
Route::get('/statuslist','Status@index')->middleware('auth', 'checkAccess:STATUS');
Route::get('/assetstatuslist','AssetStatus@index')->middleware('auth', 'checkAccess:ASSETSTATUS');
Route::get('/previouslyinstalledlist','PreviouslyInstalled@index')->middleware('auth', 'checkAccess:PREVIOUSLYINSTALLED');
Route::get('/employeeslist','Employees@index')->middleware('auth', 'checkAccess:EMPLOYEES');
Route::get('/employeeslist/detail/{id}','Employees@detail')->middleware('auth', 'checkAccess:EMPLOYEES_DETAIL');
Route::get('/employeeslist/accountability/{id}','Employees@accountability')->middleware('auth', 'checkAccess:EMPLOYEES_DETAIL');
Route::get('/supplierlist','Supplier@index')->middleware('auth', 'checkAccess:SUPPLIERS');
Route::get('/userlist','User@index')->middleware('auth', 'checkAccess:USERS');
Route::get('/usertypelist','UserType@index')->middleware('auth', 'checkAccess:USERTYPES');
Route::get('/useraccesslist','UserAccess@index')->middleware('auth', 'checkAccess:USERACCESS');
Route::get('/rolemanagement','RoleManagement@index');
Route::get('/settinglist','Settings@index')->middleware('auth', 'checkAccess:SETTINGS');

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
Route::get('/reports/assetactivity','Reports@assetactivity')->name('report')->middleware('auth', 'checkAccess:REPORTS');
Route::get('/reports/componentactivity','Reports@componentactivity')->name('report')->middleware('auth', 'checkAccess:REPORTS');
Route::get('/reports/maintenance','Reports@maintenance')->name('report')->middleware('auth', 'checkAccess:REPORTS');
Route::get('/reports/bytype','Reports@bytype')->name('report')->middleware('auth', 'checkAccess:REPORTS');
Route::get('/reports/bystatus','Reports@bystatus')->name('report')->middleware('auth', 'checkAccess:REPORTS');
Route::get('/reports/bylocation','Reports@bylocation')->name('report')->middleware('auth', 'checkAccess:REPORTS');
Route::get('/reports/bysupplier','Reports@bysupplier')->name('report')->middleware('auth', 'checkAccess:REPORTS');
Route::get('/reports/allreports','Reports@allreports')->name('report')->middleware('auth', 'checkAccess:REPORTS');

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
Route::get('department', 'Department@getdata')->middleware('auth', 'checkAccess:DEPARTMENTS');
Route::get('listdepartment', 'Department@getrows')->middleware('auth', 'checkAccess:DEPARTMENTS');
Route::post('savedepartment', 'Department@save')->middleware('auth', 'checkAccess:DEPARTMENTS_ADD');
Route::post('updatedepartment', 'Department@update')->middleware('auth', 'checkAccess:DEPARTMENTS_EDIT');
Route::post('deletedepartment', 'Department@delete')->middleware('auth', 'checkAccess:DEPARTMENTS_DELETE');
Route::post('departmentbyid', 'Department@byid')->middleware('auth', 'checkAccess:DEPARTMENTS_EDIT');

//Asset Type API
Route::get('assettype', 'AssetType@getdata')->middleware('auth', 'checkAccess:ASSETTYPES');
Route::get('listassettype', 'AssetType@getrows')->middleware('auth', 'checkAccess:ASSETTYPES');
Route::post('saveassettype', 'AssetType@save')->middleware('auth', 'checkAccess:ASSETTYPES_ADD');
Route::post('updateassettype', 'AssetType@update')->middleware('auth', 'checkAccess:ASSETTYPES_EDIT');
Route::post('deleteassettype', 'AssetType@delete')->middleware('auth', 'checkAccess:ASSETTYPES_DELETE');
Route::post('assettypebyid', 'AssetType@byid')->middleware('auth', 'checkAccess:ASSETTYPES_EDIT');

//Location API
Route::get('location', 'Location@getdata')->middleware('auth', 'checkAccess:LOCATIONS');
Route::get('listlocation', 'Location@getrows')->middleware('auth', 'checkAccess:LOCATIONS');
Route::post('savelocation', 'Location@save')->middleware('auth', 'checkAccess:LOCATIONS_ADD');
Route::post('updatelocation', 'Location@update')->middleware('auth', 'checkAccess:LOCATIONS_EDIT');
Route::post('deletelocation', 'Location@delete')->middleware('auth', 'checkAccess:LOCATIONS_DELETE');
Route::post('locationbyid', 'Location@byid')->middleware('auth', 'checkAccess:LOCATIONS_EDIT');

//Status API
Route::get('status', 'Status@getdata')->middleware('auth', 'checkAccess:STATUS');
Route::get('liststatus', 'Status@getrows')->middleware('auth', 'checkAccess:STATUS');
Route::post('savestatus', 'Status@save')->middleware('auth', 'checkAccess:STATUS_ADD');
Route::post('updatestatus', 'Status@update')->middleware('auth', 'checkAccess:STATUS_EDIT');
Route::post('deletestatus', 'Status@delete')->middleware('auth', 'checkAccess:STATUS_DELETE');
Route::post('statusbyid', 'Status@byid')->middleware('auth', 'checkAccess:STATUS_EDIT');

//Asset Status API
Route::get('assetstatus', 'AssetStatus@getdata')->middleware('auth', 'checkAccess:ASSETSTATUS');
Route::get('listassetstatus', 'AssetStatus@getrows')->middleware('auth', 'checkAccess:ASSETSTATUS');
Route::post('saveassetstatus', 'AssetStatus@save')->middleware('auth', 'checkAccess:ASSETSTATUS_ADD');
Route::post('updateassetstatus', 'AssetStatus@update')->middleware('auth', 'checkAccess:ASSETSTATUS_EDIT');
Route::post('deleteassetstatus', 'AssetStatus@delete')->middleware('auth', 'checkAccess:ASSETSTATUS_DELETE');
Route::post('assetstatusbyid', 'AssetStatus@byid')->middleware('auth', 'checkAccess:ASSETSTATUS_EDIT');

//Previously Installed API
Route::get('previouslyinstalled', 'PreviouslyInstalled@getdata')->middleware('auth', 'checkAccess:PREVIOUSLYINSTALLED');
Route::get('listpreviouslyinstalled', 'PreviouslyInstalled@getrows')->middleware('auth', 'checkAccess:PREVIOUSLYINSTALLED');
Route::post('savepreviouslyinstalled', 'PreviouslyInstalled@save')->middleware('auth', 'checkAccess:PREVIOUSLYINSTALLED_ADD');
Route::post('updatepreviouslyinstalled', 'PreviouslyInstalled@update')->middleware('auth', 'checkAccess:PREVIOUSLYINSTALLED_EDIT');
Route::post('deletepreviouslyinstalled', 'PreviouslyInstalled@delete')->middleware('auth', 'checkAccess:PREVIOUSLYINSTALLED_DELETE');
Route::post('previouslyinstalledbyid', 'PreviouslyInstalled@byid')->middleware('auth', 'checkAccess:PREVIOUSLYINSTALLED_EDIT');

//User Type API
Route::get('usertype', 'UserType@getdata')->middleware('auth', 'checkAccess:USERTYPES');
Route::get('listusertype', 'UserType@getrows')->middleware('auth', 'checkAccess:USERTYPES');
Route::post('updateusertype', 'UserType@update')->middleware('auth', 'checkAccess:USERTYPES_EDIT');
Route::post('usertypebyid', 'UserType@byid')->middleware('auth', 'checkAccess:USERTYPES_EDIT');
Route::get('usertype/access/{id}', 'UserType@access')->name('usertype')->middleware('auth', 'checkAccess:USERTYPES_EDIT');
Route::post('usertype/access/{id}', 'UserType@updateaccess')->middleware('auth', 'checkAccess:USERTYPES_EDIT');

//User Access API
Route::get('useraccess', 'UserAccess@getdata')->middleware('auth', 'checkAccess:USERACCESS');
Route::get('listuseraccess', 'UserAccess@getrows')->middleware('auth', 'checkAccess:USERACCESS');
Route::post('updateuseraccess', 'UserAccess@update')->middleware('auth', 'checkAccess:USERACCESS_EDIT');
Route::post('useraccessbyid', 'UserAccess@byid')->middleware('auth', 'checkAccess:USERACCESS_EDIT');

//Employees API
Route::get('employees', 'Employees@getdata')->middleware('auth', 'checkAccess:EMPLOYEES');
Route::get('listemployees', 'Employees@getrows')->middleware('auth', 'checkAccess:EMPLOYEES');
Route::post('saveemployees', 'Employees@save')->middleware('auth', 'checkAccess:EMPLOYEES_ADD');
Route::post('updateemployees', 'Employees@update')->middleware('auth', 'checkAccess:EMPLOYEES_EDIT');
Route::post('deleteemployees', 'Employees@delete')->middleware('auth', 'checkAccess:EMPLOYEES_DELETE');
Route::post('employeesbyid', 'Employees@byid');

//Supplier API
Route::get('supplier', 'Supplier@getdata')->middleware('auth', 'checkAccess:SUPPLIERS');
Route::get('listsupplier', 'Supplier@getrows')->middleware('auth', 'checkAccess:SUPPLIERS');
Route::post('savesupplier', 'Supplier@save')->middleware('auth', 'checkAccess:SUPPLIERS_ADD');
Route::post('updatesupplier', 'Supplier@update')->middleware('auth', 'checkAccess:SUPPLIERS_EDIT');
Route::post('deletesupplier', 'Supplier@delete')->middleware('auth', 'checkAccess:SUPPLIERS_DELETE');
Route::post('supplierbyid', 'Supplier@byid')->middleware('auth', 'checkAccess:SUPPLIERS_EDIT');

//User API
Route::get('user', 'User@getdata')->middleware('auth', 'checkAccess:USERS');
Route::get('listuser', 'User@getrows')->middleware('auth', 'checkAccess:USERS');
Route::post('saveuser', 'User@save')->middleware('auth', 'checkAccess:USERS_ADD');
Route::post('updateuser', 'User@update')->middleware('auth', 'checkAccess:USERS_EDIT');
Route::post('deleteuser', 'User@delete')->middleware('auth', 'checkAccess:USERS_DELETE');
Route::post('userbyid', 'User@byid')->middleware('auth', 'checkAccess:USERS_EDIT');

//Settings API
Route::get('settings', 'Settings@getdata')->middleware('auth', 'checkAccess:SETTINGS');
Route::post('updatesettings', 'Settings@update')->middleware('auth', 'checkAccess:SETTINGS');
Route::get('exportdatabase', 'Settings@exportdatabase')->middleware('auth', 'checkAccess:SETTINGS_DATABASE');

Route::get('asset', 'Asset@getData')->middleware('auth', 'checkAccess:ASSETS');

Route::get('listasset', 'Asset@getrows');
Route::post('saveasset', 'Asset@save')->middleware('auth', 'checkAccess:ASSETS_ADD');
Route::post('updateasset', 'Asset@update')->middleware('auth', 'checkAccess:ASSETS_EDIT');
Route::post('deleteasset', 'Asset@delete')->middleware('auth', 'checkAccess:ASSETS_DELETE');
Route::post('assetbyid', 'Asset@byid');
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