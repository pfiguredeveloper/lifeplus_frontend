<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'admin'], function() {

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('forgot-password', '\App\Http\Controllers\Auth\LoginController@forgotPassword');
    Route::post('forgot-password-update', '\App\Http\Controllers\Auth\LoginController@forgotPasswordUpdate');
    Route::auth();
    Route::get('/','admin\DashboardController@index');
    Route::get('dashboard','admin\DashboardController@index')->name('dashboard');
    Route::post('save-quick-menu','admin\DashboardController@saveQuickMenu');
    Route::get('getReminderFields/{id}/{field}','admin\DashboardController@getReminderFields');
    Route::post('save-reminder-filter','admin\DashboardController@saveReminderFilter');
    Route::resource('users', 'admin\UserController');
    
    Route::resource('policy', 'admin\PolicyController');
    Route::post('save-policy-insurance-id','admin\PolicyController@savePolicyInsurance');
    Route::get('getAgencyCode/{id}','admin\PolicyController@getAgencyCode');
    Route::get('getPartyBirthDay/{id}','admin\PolicyController@getPartyBirthDay');
    Route::get('getECSDetail/{id}','admin\PolicyController@getECSDetail');
    Route::post('getCalDetail','admin\PolicyController@getCalDetail');
    Route::post('getPremiumPrentation','admin\PolicyController@getPremiumPrentation');
    Route::post('getPlanDetail','admin\PolicyController@getPlanDetail');


    Route::resource('plan-presentation-images', 'admin\PlanPresentationImagesController');

    Route::resource('multi-policy', 'admin\MultiPolicyController');
    Route::post('multi-policy/presentation', 'admin\MultiPolicyController@ShowPresentation');
    Route::resource('servicing-reports', 'admin\ServicingReportsController');
    Route::get('servicing-reports/{id}/report', 'admin\ServicingReportsController@getReportD');
    Route::post('servicing-reports/{id}/report', 'admin\ServicingReportsController@getReport');
    Route::post('servicing-reports/{id}/reportNew', 'admin\ServicingReportsController@getNewReport');
    Route::post('servicing-reports/{id}/reportNews', 'admin\ServicingReportsController@getNewReports');
    Route::resource('marketing-reports-setup', 'admin\MarketingReportsSetupController');
    Route::resource('servicing-reports-setup', 'admin\ServicingReportsSetupController');
    Route::resource('plan-setup', 'admin\PlanSetupController');
    Route::resource('reminder-setup', 'admin\ReminderSetupController');
    Route::resource('gst-setup', 'admin\GSTRateSetupController');

    Route::resource('single-premium-posting', 'admin\SinglePremiumPostingController');
    Route::resource('multi-premium-posting', 'admin\MultiPremiumPostingController');
    Route::resource('commission-entry', 'admin\CommissionEntryController');
    Route::get('auto-commission-entry', 'admin\CommissionEntryController@autoCommission');
    Route::resource('mode-change-action', 'admin\ModeChangeActionController');
    Route::get('getPolicyNoWiseData/{id}', 'admin\ModeChangeActionController@getPolicyNoWiseData');
    Route::resource('loan-entry', 'admin\LoanEntryController');
    //Master Controller
    Route::resource('do-master','admin\DoMasterController');
    Route::resource('area-master','admin\AreaMasterController');
    Route::resource('division-master','admin\DivisionMasterController');
    Route::resource('paidby-master','admin\PaidByMasterController');
    Route::resource('pacode-master','admin\PACodeMasterController');
    Route::resource('caption-master','admin\CaptionMasterController');
    Route::resource('relation-master','admin\RelationMasterController');
    Route::resource('addgroup-master','admin\AddressGroupMasterController');
    Route::resource('bank-master','admin\BankMasterController');
    Route::resource('branch-master','admin\BranchMasterController');
    Route::resource('doctor-master','admin\DoctorMasterController');
    Route::resource('caste-master','admin\CasteMasterController');
    Route::resource('surname-master','admin\SurnameMasterController');
    Route::resource('investment-master','admin\InvestmentMasterController');
    Route::resource('gender-master','admin\GenderMasterController');
    Route::resource('status-master','admin\StatusMasterController');
    Route::resource('articals-master','admin\ArticalsMasterController');
    Route::resource('country-master','admin\CountryMasterController');
    Route::resource('state-master','admin\StateMasterController');
    Route::resource('district-master','admin\DistrictMasterController');
    Route::resource('city-master','admin\CityMasterController');
    Route::resource('familygroup-master','admin\FamilyGroupMasterController');
    Route::resource('appointment-master','admin\AppointmentMasterController');
    Route::resource('smsformat-master','admin\SMSFormatMasterController');
    Route::resource('party-master','admin\PartyMasterController');
    Route::get('getFamilyAddress/{id}','admin\PartyMasterController@getFamilyAddress');
    Route::resource('agency-master','admin\AgencyMasterController');
    Route::resource('agency-masters','admin\AgencyMasterController@index1');

    Route::resource('courier-master','admin\CourierMasterController');
    Route::resource('product-master','admin\ProductMasterController');
    Route::resource('dealer-master','admin\DealerMasterController');
    Route::resource('franchisee-master','admin\FranchiseeMasterController');
    Route::resource('franchisee-commision-master','admin\FranchiseCommisionMasterController');
    Route::resource('permissions','admin\PermissionsController');
    Route::resource('roles','admin\RolesController');
    Route::resource('clients','admin\ClientsController');

    Route::post('addModelRecord','admin\ModelDataController@addModelRecord');
    Route::get('getCityModelRecord','admin\ModelDataController@getCityModelRecord');
    Route::get('getSMSModelRecord','admin\ModelDataController@getSMSModelRecord');
    Route::get('getSMSDetailsRecord/{id}','admin\ModelDataController@getSMSDetailsRecord');
    Route::get('getFilterTableData/{id}','admin\ServicingReportsController@getFilterTableData');
    Route::get('{parent_id}/{menu_url}', 'admin\MenuManagementController@getMenu');
    Auth::routes();
});

Route::get('register/{id}', 'website\PaymentController@create');
Route::get('otp-verify/{id}', 'website\PaymentController@otpVerify');
Route::post('register_store', 'website\PaymentController@Register_Store');
Route::get('payment/{id}', 'website\PaymentController@payment')->name('payment');
Route::post('payment_store', 'website\PaymentController@Payment_Store');
Route::post('check_otp_verification', 'website\PaymentController@checkOtpVerification');
Route::get('thank-you', 'website\PaymentController@thankYou');

Route::get('/', 'website\HomeController@index');
Route::get('terms-conditions', 'website\HomeController@tnc');
Route::get('Price-List', 'website\HomeController@pricelist');
Route::get('privacy-policy', 'website\HomeController@pp');
Route::get('about-us', 'website\HomeController@aboutus');
Route::get('coming-soon', 'website\HomeController@comingSoon');
Route::get('Test-Api', 'website\HomeController@test');
Route::get('TestResult_Api', 'website\HomeController@testResult');