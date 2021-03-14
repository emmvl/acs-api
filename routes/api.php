<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Authentication api routes
Route::post('auth/check', 'UserController@check');
Route::post('auth/signin', 'UserController@login');
Route::post('auth/signup', 'UserController@register');
Route::post('auth/password-reset', 'UserController@passwordReset');

Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', 'UserController@logout');
	Route::post('/auth/update-password', 'UserController@updatePassword');
	Route::get('/auth/user', 'UserController@getUser');
});

Route::middleware('auth')->group(function () {
	Route::post('/profile/timezone', 'UserController@updateTimezone');
	Route::get('/profile/timezones', 'UserController@getTimezones');
});

// Route::group(['prefix' => 'locations'], function () {
// 	Route::get('/', 'LocationController@index')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager');
// 	Route::post('/add', 'LocationController@store')->middleware('auth:customer_admin,customer_manager');
// 	Route::patch('/update', 'LocationController@update')->middleware('auth:customer_admin,customer_manager');
// });

// Route::group(['prefix' => 'zones'], function () {
// 	Route::get('/', 'ZoneController@index')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
// 	Route::post('/add', 'ZoneController@store')->middleware('auth:customer_admin,customer_manager');
// 	Route::patch('/update', 'ZoneController@update')->middleware('auth:customer_admin,customer_manager');
// });

Route::apiResource('locations', LocationController::class)->only(['update', 'index', 'store'])->middleware('auth');
Route::apiResource('zones', ZoneController::class)->only(['update', 'index', 'store'])->middleware('auth');
Route::apiResource('materials', MaterialController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');

Route::apiResource('material-locations', MaterialLocationController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');

Route::group(['prefix' => 'materials'], function () {
	Route::post('/report', 'MaterialController@getMaterialReport')->middleware('auth:customer_admin,customer_manager');
	Route::delete('/report/{id}', 'MaterialController@deleteReport')->middleware('auth:customer_admin,customer_manager');
	Route::post('/blenders', 'MaterialController@getBlenders')->middleware('auth:customer_admin,customer_manager');
	Route::post('/export', 'MaterialController@exportReport')->middleware('auth:customer_admin,customer_manager');

	Route::post('/system-inventory-report', 'MaterialController@getSystemInventoryReport')->middleware('auth:customer_admin,customer_manager');
	Route::post('/system-inventory-report/export', 'MaterialController@exportSystemInventoryReport')->middleware('auth:customer_admin,customer_manager');
});

Route::apiResource('configurations', ConfigurationController::class)->only(['show', 'update', 'index'])->middleware('auth');

// Route::group(['prefix' => 'configurations'], function () {
// 	Route::get('/', 'ConfigurationController@getConfigurationNames');
// 	Route::get('/{id}', 'ConfigurationController@getConfiguration')->middleware('auth:super_admin');
// 	Route::patch('/{id}', 'ConfigurationController@update')->middleware('auth:super_admin');
// });

Route::group(['prefix' => 'devices'], function () {
	Route::get('/{id}/configuration', 'DeviceController@getDeviceConfiguration');
	Route::get('/customer-devices', 'DeviceController@getCustomerDevices')->middleware('auth:customer_admin,customer_manager,customer_operator');
	Route::get('/all', 'DeviceController@getAllDevices')->middleware('auth:acs_admin,acs_manager,acs_viewer');
	Route::post('/toggle-active-devices', 'DeviceController@toggleActiveDevices')->middleware('auth:acs_admin,acs_manager,acs_viewer');
	Route::post('/devices-analytics', 'DeviceController@getDevicesAnalytics')->middleware('auth:customer_admin,customer_manager,customer_operator,acs_admin,acs_manager,acs_viewer');
	Route::post('/assign-zone', 'DeviceController@updateCustomerDevice')->middleware('auth:customer_admin,customer_manager,customer_operator');
});

Route::group(['prefix' => 'downtime-plans'], function () {
	Route::get('/', 'DowntimePlanController@index')->middleware('auth:customer_admin,customer_manager,customer_operator');
	Route::post('/store', 'DowntimePlanController@store')->middleware('auth:customer_admin,customer_manager,customer_operator');
	Route::post('/update/{id}', 'DowntimePlanController@update')->middleware('auth:customer_admin,customer_manager,customer_operator');
});

Route::apiResource('users', UserController::class)->only(['edit', 'update', 'index', 'store'])->middleware('auth');

Route::group(['prefix' => 'app-settings'], function () {
	Route::post('/grab-colors', 'SwatchController@grabColors')->middleware('auth:super_admin');
	Route::post('/get-setting', 'SettingController@getSetting')->middleware('auth:super_admin');
	Route::post('/website-colors', 'SettingController@applyWebsiteColors')->middleware('auth:super_admin');
	Route::post('/upload-logo', 'SettingController@uploadLogo')->middleware('auth:super_admin');
	Route::post('/upload-image', 'SettingController@uploadImage')->middleware('auth:super_admin');
	Route::post('/update-auth-background', 'SettingController@updateAuthBackground')->middleware('auth:super_admin');
	Route::post('/reset', 'SettingController@resetSettings')->middleware('auth:super_admin');
	Route::post('/set-product-info', 'SettingController@setProductInfo')->middleware('auth:super_admin');
	Route::post('/set-page-title', 'SettingController@setPageTitle')->middleware('auth:super_admin');
});

Route::group(['prefix' => 'dashboard'], function () {
	Route::get('/init-locations-table', 'MachineController@getLocationsTableData')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::get('/init-zones-table/{id}', 'MachineController@getZonesTableData')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::get('/init-machines-table/{id}', 'MachineController@getMachinesTableData')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/devices-for-dashboard-table', 'DeviceController@getDashboardMachinesTable')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
});

Route::group(['prefix' => 'customers'], function () {
	Route::post('/add', 'CompanyController@addCustomer')->middleware('auth:acs_admin,acs_manager');
	Route::get('/{id}', 'CompanyController@getCustomer')->middleware('auth:acs_admin,acs_manager');
	Route::post('/update-account/{id}', 'CompanyController@updateCustomerAccount')->middleware('auth:acs_admin,acs_manager');
	Route::post('/update-profile/{id}', 'CompanyController@updateCustomerProfile')->middleware('auth:acs_admin,acs_manager');
});

Route::group(['prefix' => 'companies'], function () {
	Route::get('/admins', 'CompanyController@getCompanyAdmins')->middleware('auth:acs_admin,acs_manager,acs_viewer');
	Route::get('/', 'CompanyController@index')->middleware('auth:acs_admin,acs_manager,acs_viewer');
});

Route::group(['prefix' => 'devices'], function () {
	Route::post('/', 'DeviceController@getACSDevices')->middleware('auth:acs_admin,acs_manager,acs_viewer');
	Route::post('/import', 'DeviceController@importDevices')->middleware('auth:acs_admin,acs_manager');
	Route::post('/device-assigned', 'DeviceController@deviceAssigned')->middleware('auth:acs_admin,acs_manager');
	Route::post('/device-register-update', 'DeviceController@updateRegistered')->middleware('auth:acs_admin,acs_manager');
	Route::post('/suspend-device', 'DeviceController@suspendDevice')->middleware('auth:acs_admin,acs_manager');
	Route::post('/device-configuration', 'DeviceController@sendDeviceConfiguration')->middleware('auth:acs_admin,acs_manager');
	Route::post('/enabled-properties', 'DeviceController@updateEnabledProperties')->middleware('auth:acs_admin,acs_manager');

	Route::get('/query-sim/{iccid}', 'DeviceController@querySIM')->middleware('auth:acs_admin,acs_manager');
	Route::get('/suspend-sim/{iccid}', 'DeviceController@suspendSIM')->middleware('auth:acs_admin,acs_manager');
	Route::get('/remote-web/{deviceid}', 'DeviceController@remoteWeb')->middleware('auth:acs_admin,acs_manager');
	Route::get('/remote-cli/{deviceid}', 'DeviceController@remoteCli')->middleware('auth:acs_admin,acs_manager');
});

Route::group(['prefix' => 'machine-tags'], function () {
	Route::get('/{id}', 'MachineTagController@getMachineTags')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
});

Route::group(['prefix' => 'analytics'], function () {
	Route::post('/data-tool-series', 'MachineController@getDataToolSeries')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-overview', 'MachineController@getProductOverview')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-utilization', 'MachineController@getProductUtilization')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-energy-consumption', 'MachineController@getEnergyConsumption')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-inventory', 'MachineController@getInventories')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-station-conveyings', 'MachineController@getStationConveyings')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::get('/weekly-running-hours/{id}', 'MachineController@getWeeklyRunningHours')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-weight', 'MachineController@getProductWeight')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-current-recipe', 'MachineController@getCurrentRecipe')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/blender/process-rate', 'MachineController@getBlenderProcessRate')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/blender/capability', 'MachineController@getBlenderCapabilities')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/blender/inventory-material', 'MachineController@updateInventoryMaterial')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/blender/toggle-in-progress', 'MachineController@updateTrackingStatus')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/blender/calibration-factors', 'MachineController@getBDBlenderCalibrationFactors')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/blender/load-cells', 'MachineController@getLoadCells')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/accumeter/blender-capabilities', 'MachineController@getBlenderCapabilities')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/accumeter/feeder-calibrations', 'MachineController@getFeederCalibrations')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/accumeter/feeder-speeds', 'MachineController@getFeederSpeeds')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/accumeter/target-rate', 'MachineController@getTargetRate')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/accumeter/recipe', 'MachineController@getTgtActualRecipes')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-system-states', 'MachineController@getProductStates')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-hopper-stables', 'MachineController@getHopperStables')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-system-states-3', 'MachineController@getMachineStates3')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-feeder-stables', 'MachineController@getFeederStables')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-production-rate', 'MachineController@getProductProcessRate')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-hopper-inventories', 'MachineController@getInventories3')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-hauloff-lengths', 'MachineController@getHauloffLengths')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/vtc-plus/pump-onlines', 'MachineController@getPumpOnlines')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/vtc-plus/pump-blowbacks', 'MachineController@getPumpBlowBacks')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/vtc-plus/pump-hours-oil', 'MachineController@getPumpHoursOil')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/vtc-plus/pump-hours', 'MachineController@getPumpHours')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/vtc-plus/pump-online-life', 'MachineController@getPumpOnlineLife')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-drying-hopper-states', 'MachineController@getDryingHopperStates')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/product-hopper-temperatures', 'MachineController@getHopperTemperatures')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');

	Route::post('/ngx-dryer/bed-states', 'MachineController@getNgxDryerBedStates')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/ngx-dryer/online-hours', 'MachineController@getNgxDryerOnlineHours')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/ngx-dryer/dew-point-temperature', 'MachineController@getDewPointTemperature')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/ngx-dryer/region-air-temperature', 'MachineController@getRegionAirTemperature')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');

	Route::post('/ngx-nomad-dryer/hopper-states', 'MachineController@getNomadHopperStates')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');

	Route::post('/tcu/actual-target-temperature', 'MachineController@getTcuActTgtTemperature')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');

	Route::post('/portable-chiller/process-out-temperature', 'MachineController@getProcessOutTemperature')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');

	Route::post('/central-chiller/chiller-in-out-temperature', 'MachineController@getCentralChillerTemperature')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');

	Route::post('/t50-granulator/runnings', 'MachineController@getT50Runnings')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/t50-granulator/hours', 'MachineController@getT50Hours')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/t50-granulator/bearing-temp', 'MachineController@getT50BearingTemp')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/t50-granulator/amps', 'MachineController@getT50Amps')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
});

Route::group(['prefix' => 'notes', 'middleware' => 'auth'], function () {
	Route::post('/', 'NoteController@store')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::get('/{device_id}', 'NoteController@index')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
});

Route::group(['prefix' => 'alarms'], function () {
	Route::post('/alarms-for-customer-devices', 'AlarmController@getAlarmsForCustomerDevices')->middleware('auth:customer_admin,customer_manager,customer_operator');
	Route::post('/', 'AlarmController@getProductAlarms')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/overview', 'AlarmController@getAlarmsOverview')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/per-company-configuration', 'AlarmController@getAlarmsForCompany')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::get('/alarms-by-company-id/{company_id}', 'AlarmController@getAlarmsByCompanyId')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/severity-by-company-id', 'AlarmController@getSeverityByCompanyId')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/alarms-per-type-by-machine', 'AlarmController@getAlarmsPerTypeByMachine')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/alarms-distribution-by-machine', 'AlarmController@getAlarmsDistributionByMachine')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
	Route::post('/alarms-amount-per-machine-by-company-id', 'AlarmController@getAlarmsAmountPerMachineByCompanyId')->middleware('auth:acs_admin,acs_manager,acs_viewer,customer_admin,customer_manager,customer_operator');
});

Route::group(['prefix' => 'cities'], function () {
	Route::get('/{state}', 'CityController@citiesForState');
});

Route::group(['prefix' => 'settings'], function () {
	Route::get('/app-settings', 'SettingController@appSettings')->middleware('auth:super_admin');
});

Route::post('test/send-mail', 'CompanyController@testMail');
Route::post('test/send-sms', 'CompanyController@testSMS');
Route::post('test/blender-json', 'TestController@store');

Route::post('test/azure', 'DeviceController@testAzureJson');
Route::post('test', 'DeviceController@testFunction');
Route::post('test/carrier/{id}', 'DeviceController@carrierFromKoreAPI');

Route::get('test/pusher-notification', 'DeviceController@sendEvent');
