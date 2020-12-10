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
Route::get('/', 'homeController@index');
// HOME - END
// AUTH
Route::get('/dang-nhap', 'homeController@login')->name('dang-nhap');
Route::post('/dang-nhap', 'homeApi@loginPost');
Route::get('/dang-ky', 'homeController@register');
Route::post('/dang-ky', 'homeApi@registerPost');
Route::get('/quen-mat-khau', 'homeController@forgotPsw');
Route::post('/quen-mat-khau', 'homeApi@forgotPswPost');
Route::get('/doi-quen-mat-khau', 'homeController@changeForgotPsw');
Route::post('/doi-quen-mat-khau', 'homeApi@changeForgotPswPost');
Route::get('/cap-nhat-tai-khoan', 'homeController@updateAccount')->middleware('auth');
Route::post('/cap-nhat-tai-khoan', 'homeApi@updateAccountPost')->middleware('auth');
Route::get('/doi-mat-khau', 'homeController@changePsw')->middleware('auth');
Route::post('/doi-mat-khau', 'homeApi@changePswPost')->middleware('auth');
Route::get('/tim-lich-su', 'homeController@findHistory');
Route::post('/tim-lich-su', 'homeApi@findHistoryPost');
Route::get('/lich-su-2', 'homeController@history2');
Route::get('/lich-su', 'homeController@history')->middleware('auth');
Route::post('/lich-su', 'homeApi@historyPost')->middleware('auth');
Route::post('/dang-xuat', 'homeApi@logoutPost')->middleware('auth');
// AUTH

// COMMON
Route::get('/gioi-thieu', 'homeController@about');
Route::get('/thu-vien', 'homeController@gallery');
// COMMON - END
// CONTACT
Route::get('/lien-he', 'homeController@contact');
Route::post('/lien-he', 'homeAPI@contactPost');

// PARTNERS
Route::get('/doi-tac', 'homeController@partners');
Route::get('/doi-tac-resign', 'homeController@partnersResign');
Route::get('/doi-tac-resign-demo', 'homeController@partnersResignDemo');
Route::get('/doi-tac-checkout', 'homeController@partnersCheckout');
Route::get('/doi-tac/dt/{id}', 'homeController@partnersDetail');
Route::get('/check-out-part', 'homeController@checkOutPart');
// PARTNERS - END
// TOURS
Route::get('/tours', 'homeController@tours');
Route::get('/tours/mien/{id}', 'homeController@toursByMien');
Route::get('/tours/dt/{id}', 'homeController@toursDetail');
Route::get('tours-search/{id}', 'homeController@toursSearch');
// TOURS - END
// NEWS
Route::get('/tim-tin-tuc', 'homeController@searchNews');
Route::get('/tin-tuc', 'homeController@news');
Route::get('/tin-tuc/dt/{id}', 'homeController@newsDetail');
// NEWS - END
// CHECKOUT
Route::post('/thanh-toan-1', 'homeController@checkoutOne');
Route::post('/thanh-toan-2', 'homeController@checkoutTwo');
Route::get('/thanh-toan-3', 'homeController@checkoutThree');
Route::get('/thanh-toan-4', 'homeController@checkoutFour');
// CHECKOUT - END
Route::get('/timkiem', 'homeController@timkiem');
Route::get('/searchByTag/{key}', 'homeController@searchByTag');






/** TRANG ADMIN */
// COMMON
Route::get('admin', 'dashboardController@login');
Route::get('admin/loginCms', 'dashboardController@loginCms');
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
Route::get('admin/formedituser/{id}', 'dashboardController@formEditUser')->middleware('CheckRole');

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
Route::get('admin/deltour/{id}', 'dashboardController@delTour')->middleware('CheckAdmins');
Route::post('admin/addtour', 'dashboardController@addTour')->middleware('CheckAdmins');
Route::get('admin/edittour/{id}', 'dashboardController@editTour')->middleware('CheckAdmins');
Route::post('admin/addschedule', 'dashboardController@addSchedule')->middleware('CheckAdmins');
Route::post('admin/updatetour', 'dashboardController@updateTour')->middleware('CheckAdmins');
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
Route::post('admin/addgallery', 'dashboardController@addGallery');
Route::get('admin/gallery', 'dashboardController@galleryTable');
// Trang gallery-------------------------------------- END

// Trang 404 admin
Route::any('admin{catchall}', 'dashboardController@notfound')->where('catchall', '.*');
// Trang 404 admin-------------------------------------- END
// 404
Route::any('{catchall}', 'homeController@notfound')->where('catchall', '.*');
// 404 - END
