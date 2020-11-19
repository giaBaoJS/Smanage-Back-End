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


/** TRANG CHỦ */

// HOME
Route::get('/','homeController@index');
// HOME - END

// AUTH
Route::get('/dang-nhap','homeController@login');
Route::get('/dang-ky','homeController@register');
Route::get('/cap-nhat-tai-khoan','homeController@updateAccount');
Route::get('/doi-mat-khau','homeController@changePsw');
Route::get('/quen-mat-khau','homeController@forgotPsw');
Route::get('/lich-su','homeController@history');
// AUTH

// COMMON
Route::get('/gioi-thieu','homeController@about');
Route::get('/lien-he','homeController@contact');
Route::get('/thu-vien','homeController@gallery');
// COMMON - END
// PARTNERS 
Route::get('/doi-tac','homeController@partners');
Route::get('/doi-tac/dt','homeController@partnersDetail');
// PARTNERS - END
// TOURS
Route::get('/tours','homeController@tours');
Route::get('/tours/dt','homeController@toursDetail');
// TOURS - END
// NEWS 
Route::get('/tin-tuc','homeController@news');
Route::get('/tin-tuc/dt','homeController@newsDetail');
// NEWS - END
// CHECKOUT
Route::get('/thanh-toan-1','homeController@checkoutOne');
Route::get('/thanh-toan-2','homeController@checkoutTwo');
Route::get('/thanh-toan-3','homeController@checkoutThree');
Route::get('/thanh-toan-4','homeController@checkoutFour');
// CHECKOUT - END

/** TRANG ADMIN */
// COMMON
Route::get('admin', 'dashboardController@login');
Route::get('admin/loginCms', 'dashboardController@loginCms');
Route::get('admin/register', 'dashboardController@register');
Route::get('admin/logout', 'dashboardController@logout');
Route::get('admin/dashboard', 'dashboardController@index')->middleware('CheckAdmins');
Route::get('admin/loitruycap', 'dashboardController@errorTruycap');
Route::get('admin/loiactive', 'dashboardController@errorActive');
Route::get('admin/recoverpw', 'dashboardController@recoverpw');
Route::get('admin/lockscreen', 'dashboardController@lockScreen');
// COMON -------------------- END

// Trang contact --------------------
Route::get('admin/contact', 'dashboardController@contactTable')->middleware('CheckRole');
// Trang contact -------------------- END

// Trang coupon --------------------
Route::get('admin/coupon', 'dashboardController@couponTable')->middleware('CheckAdmins');
Route::get('admin/coupon/add', 'dashboardController@couponAdd')->middleware('CheckAdmins');
Route::post('admin/addcoupon', 'dashboardController@addCoupon')->middleware('CheckAdmins');
Route::get('admin/activecoupon/{id}', 'dashboardController@activeCoupon')->middleware('CheckAdmins');
Route::get('admin/delcoupon/{id}', 'dashboardController@delCoupon')->middleware('CheckAdmins');
Route::get('admin/formeditcoupon/{id}', 'dashboardController@editFormCoupon')->middleware('CheckAdmins');
Route::post('admin/editcoupon/{id}', 'dashboardController@editCoupon')->middleware('CheckAdmins');
// Trang coupon -------------------- END

// Trang user --------------------
Route::get('admin/user', 'dashboardController@userTable')->middleware('CheckRole');
Route::get('admin/add-user', 'dashboardController@addUser')->middleware('CheckRole');
// Trang user -------------------- END

// Trang slider --------------------
Route::get('admin/slider', 'dashboardController@sliderTable')->middleware('CheckRole');
Route::get('admin/slider/add', 'dashboardController@sliderAdd')->middleware('CheckRole');
Route::post('admin/addSlider', 'dashboardController@addSlider')->middleware('CheckRole');
Route::get('admin/editformslider/{id}', 'dashboardController@editformSlider')->middleware('CheckAdmins');
Route::post('admin/editSlider/{id}', 'dashboardController@editSlider')->middleware('CheckAdmins');
Route::get('admin/delslider/{id}', 'dashboardController@delSlider')->middleware('CheckAdmins');
// Trang slider -------------------- END

// Trang mien --------------------
Route::get('admin/mien', 'dashboardController@mienTable')->middleware('CheckRole');
Route::get('admin/mien/add', 'dashboardController@mienAdd')->middleware('CheckRole');
Route::post('admin/addMien', 'dashboardController@addMien')->middleware('CheckAdmins');
Route::get('admin/delMien/{id}', 'dashboardController@delMien')->middleware('CheckAdmins');
Route::get('admin/formeditmien/{id}', 'dashboardController@editFormMien')->middleware('CheckAdmins');
Route::post('admin/editMien/{id}', 'dashboardController@editMien')->middleware('CheckAdmins');
// Trang mien -------------------- END

// Trang tinhthanh --------------------
Route::get('admin/tinhthanh', 'dashboardController@tinhthanhTable')->middleware('CheckRole');
Route::get('admin/tinhthanh/add', 'dashboardController@tinhthanhAdd')->middleware('CheckRole');
Route::get('admin/delTinh/{id}', 'dashboardController@delTinh')->middleware('CheckAdmins');
Route::post('admin/addTinh', 'dashboardController@addTinh')->middleware('CheckAdmins');
Route::get('admin/formedittinh/{id}', 'dashboardController@editFormTinh')->middleware('CheckAdmins');
Route::post('admin/editTinh/{id}', 'dashboardController@editTinh')->middleware('CheckAdmins');
// Trang tinhthanh -------------------- END

// Trang tours --------------------
Route::get('admin/tours', 'dashboardController@toursTable')->middleware('CheckAdmins');
Route::get('admin/tours/add', 'dashboardController@toursAdd')->middleware('CheckAdmins');
// Trang tours -------------------- END

// Trang bill --------------------
Route::get('admin/bill', 'dashboardController@billTable')->middleware('CheckRole');
// Trang bill -------------------- END

// Trang news --------------------
Route::get('admin/news', 'dashboardController@newsTable')->middleware('CheckRole');
Route::get('admin/news/add', 'dashboardController@newsAdd')->middleware('CheckRole');
Route::post('admin/addnews', 'dashboardController@addNews')->middleware('CheckRole');
Route::get('admin/formeditnew/{id}', 'dashboardController@formEditNew')->middleware('CheckRole');
Route::get('admin/viewsnews/{id}', 'dashboardController@viewsNews')->middleware('CheckRole');
Route::post('admin/editnews', 'dashboardController@editNews')->middleware('CheckRole');
// Trang news -------------------- END

// Trang gallery--------------------------------------
Route::post('admin/addgallery','dashboardController@addGallery');
Route::get('admin/gallery', 'dashboardController@galleryTable');
// Trang gallery-------------------------------------- END

// Trang 404 admin
Route::any('admin{catchall}', 'dashboardController@notfound')->where('catchall', '.*');
// Trang 404 admin-------------------------------------- END
// 404
Route::any('{catchall}', 'homeController@notfound')->where('catchall', '.*');
// 404 - END