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

Route::get('/', function () {
    return view('welcome');
});
// trang admin --------------------
Route::get('admin', 'dashboardController@login');
Route::get('admin/loginCms', 'dashboardController@loginCms');
Route::get('admin/register', 'dashboardController@register');
Route::get('admin/logout', 'dashboardController@logout');
Route::get('admin/dashboard', 'dashboardController@index')->middleware('CheckAdmins');
Route::get('admin/loitruycap', 'dashboardController@errorTruycap');
Route::get('admin/loiactive', 'dashboardController@errorActive');
Route::get('admin/recoverpw', 'dashboardController@recoverpw');
Route::get('admin/lockscreen', 'dashboardController@lockScreen');
// Trang contact --------------------

Route::get('admin/contact', 'dashboardController@contactTable')->middleware('CheckRole');

// Trang contact --------------------
// ---------------------------------><---------------------------------
// Trang coupon --------------------

Route::get('admin/coupon', 'dashboardController@couponTable')->middleware('CheckAdmins');
Route::get('admin/coupon/add', 'dashboardController@couponAdd')->middleware('CheckAdmins');
Route::post('admin/addcoupon', 'dashboardController@addCoupon')->middleware('CheckAdmins');
Route::get('admin/activecoupon/{id}', 'dashboardController@activeCoupon')->middleware('CheckAdmins');
Route::get('admin/delcoupon/{id}', 'dashboardController@delCoupon')->middleware('CheckAdmins');
Route::get('admin/formeditcoupon/{id}', 'dashboardController@editFormCoupon')->middleware('CheckAdmins');
Route::post('admin/editcoupon/{id}', 'dashboardController@editCoupon')->middleware('CheckAdmins');

// Trang coupon --------------------
// ---------------------------------><---------------------------------
// Trang user --------------------

Route::get('admin/user', 'dashboardController@userTable')->middleware('CheckRole');
Route::get('admin/add-user', 'dashboardController@addUser')->middleware('CheckRole');

// Trang user --------------------
// ---------------------------------><---------------------------------

// Trang slider --------------------
Route::get('admin/slider', 'dashboardController@sliderTable')->middleware('CheckRole');
Route::get('admin/slider/add', 'dashboardController@sliderAdd')->middleware('CheckRole');
Route::post('admin/addSlider', 'dashboardController@addSlider')->middleware('CheckRole');
Route::get('admin/editformslider/{id}', 'dashboardController@editformSlider')->middleware('CheckAdmins');
Route::post('admin/editSlider/{id}', 'dashboardController@editSlider')->middleware('CheckAdmins');
// Trang mien --------------------
Route::get('admin/mien', 'dashboardController@mienTable')->middleware('CheckRole');
Route::get('admin/mien/add', 'dashboardController@mienAdd')->middleware('CheckRole');
Route::post('admin/addMien', 'dashboardController@addMien')->middleware('CheckAdmins');
Route::get('admin/delMien/{id}', 'dashboardController@delMien')->middleware('CheckAdmins');
Route::get('admin/formeditmien/{id}', 'dashboardController@editFormMien')->middleware('CheckAdmins');
Route::post('admin/editMien/{id}', 'dashboardController@editMien')->middleware('CheckAdmins');
// Trang mien --------------------
// ---------------------------------><---------------------------------

// Trang tinhthanh --------------------
Route::get('admin/tinhthanh', 'dashboardController@tinhthanhTable')->middleware('CheckRole');
Route::get('admin/tinhthanh/add', 'dashboardController@tinhthanhAdd')->middleware('CheckRole');
Route::get('admin/delTinh/{id}', 'dashboardController@delTinh')->middleware('CheckAdmins');
Route::post('admin/addTinh', 'dashboardController@addTinh')->middleware('CheckAdmins');
Route::get('admin/formedittinh/{id}', 'dashboardController@editFormTinh')->middleware('CheckAdmins');
Route::post('admin/editTinh/{id}', 'dashboardController@editTinh')->middleware('CheckAdmins');
// Trang tinhthanh --------------------
// ---------------------------------><---------------------------------

// Trang tours --------------------
Route::get('admin/tours', 'dashboardController@toursTable')->middleware('CheckAdmins');
Route::get('admin/tours/add', 'dashboardController@toursAdd')->middleware('CheckAdmins');
// Trang tours --------------------
// ---------------------------------><---------------------------------

// Trang bill --------------------
Route::get('admin/bill', 'dashboardController@billTable')->middleware('CheckRole');

// Trang bill --------------------
// ---------------------------------><---------------------------------
// Trang news --------------------

Route::get('admin/news', 'dashboardController@newsTable')->middleware('CheckRole');
Route::get('admin/news/add', 'dashboardController@newsAdd')->middleware('CheckRole');

// Trang news --------------------

//Trang gallery--------------------------------------

Route::get('admin/gallery', 'dashboardController@galleryTable');

//Trang gallery--------------------------------------

Route::any('{catchall}', 'dashboardController@notfound')->where('catchall', '.*');
