<?php
namespace App\Http\Controllers\FreshStart;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EnquiryController;


use App\Mail\MyMail;
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



//Auth 

Route::match(['get', 'post'], 'cronJobs', 'home\CronJobsController@cronJobs');

Route::get('softwareTokenStatus', function () {
	session()->put('softwareTokenStatus', 1);
});
Route::match(['get', 'post'], 'set_session_count', 'Auth\AuthController@setCountSession');
Route::match(['get', 'post'], 'login', 'Auth\AuthController@login');
Route::match(['get', 'post'], 'forgot_password', 'Auth\AuthController@forgotPassword');
Route::match(['get', 'post'], 'logout', 'Auth\AuthController@logout');
Route::match(['get', 'post'], 'is-login', 'Auth\AuthController@getIslogin');
Route::match(['get', 'post'], 'getregister', 'Auth\AuthController@getregister');
Route::match(['get', 'post'], 'register', 'Auth\AuthController@register');
Route::match(['get'], 'getLocation', 'Auth\AuthController@getLocation');

Route::group(['middleware' => ['islogin', 'prevent.history']], function () {

	//Customer
	Route::match(['get', 'post'], 'esh2/customers/gettingStarted', 'esh2\customers\CustomerController@gettingStarted');
	Route::match(['get', 'post'], 'esh2/customers/edit/{id}', 'esh2\customers\CustomerController@edit');
	Route::match(['get', 'post'], 'esh2/customers/list', 'esh2\customers\CustomerController@list');
	Route::match(['get', 'post'], 'esh2/customers/view', 'esh2\customers\CustomerController@view');
	Route::match(['get', 'post'], 'esh2/customers/listOnMap', 'esh2\customers\CustomerController@listOnMap');

	//Enquiry
	Route::match(['get', 'post'], 'esh2/enquiry/add', 'esh2\enquiry\EnquiryController@add');
	Route::match(['get', 'post'], 'esh2/enquiry/list', 'esh2\enquiry\EnquiryController@list');
	Route::match(['get', 'post'], 'esh2/enquiry/edit/{id}', 'esh2\enquiry\EnquiryController@edit');
	Route::match(['get', 'post'], 'esh2/enquiry/delete', 'esh2\enquiry\EnquiryController@delete');
	Route::match(['get', 'post'], 'esh2/enquiry/view/{id}', 'esh2\enquiry\EnquiryController@view');

	//Settings
	Route::match(['get', 'post'], 'viewSetting', 'SettingsController@viewSetting');
	Route::match(['get', 'post'], 'editSetting/{id}', 'SettingsController@editSetting');
	//User
	Route::match(['get', 'post'], 'esh2/user/create', 'esh2\user\UserController@createUser');
	Route::match(['get', 'post'], 'esh2/user/list', 'esh2\user\UserController@userList');
	Route::match(['get', 'post'], 'editUser/{id}', 'UserController@editUser');
	Route::match(['get', 'post'], 'deleteUser', 'UserController@deleteUser');
	Route::match(['get', 'post'], 'userStatus', 'UserController@userStatus');

	//dashboard
	Route::match(['get'], '/', 'dashboard\DashboardController@index');


	//home
	Route::match(['get'], 'cityData/{id}', 'home\HomeController@cityData');
	Route::match(['get', 'post'], 'search', 'home\HomeController@search');

	Route::match(['get', 'post'], 'profile', 'ProfileController@profile');
	Route::match(['get', 'post'], 'profile/edit/{id}', 'ProfileController@profileEdit');
	Route::match(['get', 'post'], 'all_students_search', 'DashboardController@allStudentsSearch');
	Route::match(['get', 'post'], 'get_modules', 'DashboardController@getModules');

	//user
	Route::get('create-user', 'UserController@createuser');


	//expense
	Route::match(['get', 'post'], 'esh2/expenses/add', 'esh2\expenses\ExpenseController@add');
	Route::match(['get', 'post'], 'esh2/expenses/list', 'esh2\expenses\ExpenseController@list');
	Route::match(['get', 'post'], 'esh2/expenses/edit/{id}', 'esh2\expenses\ExpenseController@edit');
	Route::delete('esh2/expenses/delete/{id}', 'esh2\expenses\ExpenseController@delete');
	Route::match(['get', 'post'], 'esh2/expenses/statusChange', 'esh2\expenses\ExpenseController	@statusChange');

	//certificate
	Route::match(['get', 'post'], 'esh2/certificate/list', 'esh2\certificate\CertificateController@list');
	Route::match(['get', 'post'], 'esh2/certificate/edit/{id}', 'esh2\certificate\CertificateController@edit');
	Route::match(['get', 'post'], 'esh2/certificate/add', 'esh2\certificate\CertificateController@add');
	Route::match(['get', 'post'], 'esh2/certificate/statusChange', 'esh2\certificate\CertificateController@statusChange');
    Route::delete('esh2/certificate/delete/{id}', 'esh2\certificate\CertificateController@delete');

	//homeslider

	Route::match(['get', 'post'], 'esh2/homeslider/list', 'esh2\homeslider\HomesliderController@list');
	Route::match(['get', 'post'], 'esh2/homeslider/edit/{id}', 'esh2\homeslider\HomesliderController@edit');
	Route::match(['get', 'post'], 'esh2/homeslider/add', 'esh2\homeslider\HomesliderController@add');
	Route::delete('esh2/homeslider/delete/{id}', 'esh2\homeslider\HomesliderController@delete');
	Route::match(['get', 'post'], 'esh2/homeslider/statusChange', 'esh2\homeslider\HomesliderController@statusChange');





	//faq
	Route::match(['get', 'post'], 'esh2/faqs/add', 'esh2\faqs\FaqController@add');
	Route::match(['get', 'post'], 'esh2/faqs/edit/{id}', 'esh2\faqs\FaqController@edit');
	Route::match(['get', 'post'], 'esh2/faqs/view', 'esh2\faqs\FaqController@view');
	Route::match(['get', 'post'], 'esh2/faqs/statusChange', 'esh2\faqs\FaqController@statusChange');
	Route::delete('esh2/faqs/delete/{id}', 'esh2\faqs\FaqController@delete');




	//student
	Route::match(['get', 'post'], 'esh2/students/add', 'esh2\students\StudentController@add');
	Route::match(['get', 'post'], 'esh2/students/edit/{id}', 'esh2\students\StudentController@edit');
	Route::match(['get', 'post'], 'esh2/students/view', 'esh2\students\StudentController@view');
	Route::match(['get', 'post'], 'esh2/students/statusChange', 'esh2\students\StudentController@statusChange');
    Route::delete('esh2/students/delete/{id}', 'esh2\students\StudentController@delete');



	//imagegallery
	Route::match(['get', 'post'], 'esh2/imagegallery/add', 'esh2\imagegallery\ImagegalleryController@add');
	Route::match(['get', 'post'], 'esh2/imagegallery/edit/{id}', 'esh2\imagegallery\ImagegalleryController@edit');
	Route::match(['get', 'post'], 'esh2/imagegallery/view', 'esh2\imagegallery\ImagegalleryController@view');
	Route::match(['get', 'post'], 'esh2/imagegallery/statusChange', 'esh2\imagegallery\ImagegalleryController@statusChange');
    Route::delete('esh2/imagegallery/delete/{id}', 'esh2\imagegallery\ImagegalleryController@delete');



	//offers
	Route::match(['get', 'post'], 'esh2/offers/add', 'esh2\offers\OfferController@add');
	Route::match(['get', 'post'], 'esh2/offers/view', 'esh2\offers\OfferController@view');
	Route::match(['get', 'post'], 'esh2/offers/edit/{id}', 'esh2\offers\OfferController@edit');
	Route::delete('esh2/offers/delete/{id}', 'esh2\offers\OfferController@delete');
	Route::match(['get', 'post'], 'esh2/offers/statusChange', 'esh2\offers\OfferController@statusChange');


    //Role management
	Route::match(['get', 'post'], 'esh2/roles/list', 'esh2\roles\RoleController@list');
	Route::match(['get', 'post'], 'esh2/roles/edit/{id}', 'esh2\roles\RoleController@edit');
	Route::match(['get', 'post'], 'esh2/roles/add', 'esh2\roles\RoleController@add');
    Route::delete('esh2/roles/delete/{id}', 'esh2\roles\RoleController@delete');


    //expense
	Route::match(['get', 'post'], 'esh2/branchs/add', 'esh2\branchs\BranchController@add');
	Route::match(['get', 'post'], 'esh2/branchs/list', 'esh2\branchs\BranchController@list');
	Route::match(['get', 'post'], 'esh2/branchs/edit/{id}', 'esh2\branchs\BranchController@edit');
	Route::delete('esh2/branchs/delete/{id}', 'esh2\branchs\BranchController@delete');
	Route::match(['get', 'post'], 'esh2/branchs/statusChange', 'esh2\branchs\BranchController@statusChange');

		

    //inventery
	Route::match(['get', 'post'], 'esh2/inventery/add', 'esh2\inventery\InventeryController@add');
	Route::match(['get', 'post'], 'esh2/inventery/list', 'esh2\inventery\InventeryController@list');
	Route::match(['get', 'post'], 'esh2/inventery/edit/{id}', 'esh2\inventery\InventeryController@edit');
	Route::delete('esh2/inventery/delete/{id}', 'esh2\inventery\InventeryController@delete');

});
