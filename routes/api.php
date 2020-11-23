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
Route::GET('admin/add-account','apiDashboard@addAccount');
Route::GET('admin/loginlock','apiDashboard@loginLock');
Route::GET('admin/delcontact/{id}','apiDashboard@deleteContact');
Route::GET('admin/onecounpon/{id}','apiDashboard@oneCounpon');

Route::GET('admin/doitac','apiDashboard@doiTac');

Route::GET('admin/adduser','apiDashboard@addUser');
Route::GET('admin/updateuser','apiDashboard@updateUser');
Route::GET('admin/rtlogin','apiDashboard@returnLogin');
Route::GET('admin/setpremium','apiDashboard@setPremium');

// -----------------coupon---------------

Route::GET('admin/activecoupon','apiDashboard@activeCoupon');
Route::GET('admin/delcoupon/{id}','apiDashboard@delCoupon');
// -----------------coupon---------------

// -----------------gallery---------------

Route::GET('admin/delgallery/{id}','apiDashboard@delgallery');
Route::GET('admin/editgallery/{id}','apiDashboard@editgallery');
// -----------------gallery---------------
// -----------------news---------------

Route::GET('admin/delnews/{id}','apiDashboard@delNews');
Route::GET('admin/editnews/{id}','apiDashboard@editNews');
// -----------------news---------------



//END admin

//HOME

//commnent
Route::GET('addcomment','homeAPI@addComment');
