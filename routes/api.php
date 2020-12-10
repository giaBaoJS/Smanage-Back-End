<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::GET('admin/add-account', 'apiDashboard@addAccount');
Route::GET('admin/loginlock', 'apiDashboard@loginLock');
Route::GET('admin/delcontact/{id}', 'apiDashboard@deleteContact');
Route::GET('admin/onecounpon/{id}', 'apiDashboard@oneCounpon');

Route::GET('admin/doitac', 'apiDashboard@doiTac');

Route::GET('admin/adduser', 'apiDashboard@addUser');
Route::GET('admin/updateuser', 'apiDashboard@updateUser');
Route::GET('admin/rtlogin', 'apiDashboard@returnLogin');
Route::GET('admin/setpremium', 'apiDashboard@setPremium');

// -----------------coupon---------------

Route::GET('admin/activecoupon', 'apiDashboard@activeCoupon');
Route::GET('admin/delcoupon/{id}', 'apiDashboard@delCoupon');
Route::GET('admin/checknamecoupon', 'apiDashboard@checkNameCoupon');
// -----------------coupon---------------

// -----------------gallery---------------

Route::GET('admin/delgallery/{id}', 'apiDashboard@delgallery');
Route::GET('admin/editgallery/{id}', 'apiDashboard@editgallery');
// -----------------gallery---------------
// -----------------news---------------

Route::GET('admin/delnews/{id}', 'apiDashboard@delNews');
Route::GET('admin/editnews/{id}', 'apiDashboard@editNews');
// -----------------news---------------
Route::GET('admin/chart', 'apiDashboard@chart');
Route::GET('admin/chart-admin', 'apiDashboard@chartadmin');
Route::GET('admin/showtinh/{id}', 'apiDashboard@showTinh');



//END admin

//HOME

//commnent
Route::POST('addcomment', 'homeAPI@addComment');
Route::GET('pagination-cmts', 'homeAPI@paginationCmts');
Route::GET('pagination-news', 'homeAPI@paginationNews');
//COUPON
Route::GET('admin/checkcp', 'homeAPI@checkCoupon');

//passenger
Route::GET('admin/addpassenger', 'homeAPI@addPassenger');
Route::GET('admin/addpayment', 'homeAPI@addPayment');

//BILL
Route::GET('admin/billdetail/{id}', 'homeAPI@billDetail');
Route::GET('admin/passdetail/{id}', 'homeAPI@passDetail');
//PARTERT
Route::GET('/create-part-demo','homeAPI@createPartnerDemo');
Route::GET('/create-part','homeAPI@createPartner');
Route::GET('/paymentpart','homeAPI@paymentPart');
// Route::GET('/searchtour','homeAPI@searchTour');
