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

Route::get('admin','dashboardController@login');
Route::get('admin/dashboard','dashboardController@index');

// Trang contact --------------------

Route::get('admin/contact','dashboardController@contactTable');

// Trang contact --------------------

// Trang coupon --------------------

Route::get('admin/coupon','dashboardController@couponTable');
Route::get('admin/coupon/add','dashboardController@couponAdd');

// Trang coupon --------------------

// Trang user --------------------

Route::get('admin/user','dashboardController@userTable');

// Trang user --------------------

// Trang mien --------------------

Route::get('admin/mien','dashboardController@mienTable');
Route::get('admin/mien/add','dashboardController@mienAdd');

// Trang mien --------------------

// Trang tinhthanh --------------------

Route::get('admin/tinhthanh','dashboardController@tinhthanhTable');
Route::get('admin/tinhthanh/add','dashboardController@tinhthanhAdd');

// Trang tinhthanh --------------------

// Trang tours --------------------

Route::get('admin/tours','dashboardController@toursTable');
Route::get('admin/tours/add','dashboardController@toursAdd');

// Trang tours --------------------

// Trang bill --------------------

Route::get('admin/bill','dashboardController@billTable');

// Trang bill --------------------

// Trang news --------------------

Route::get('admin/news','dashboardController@newsTable');
Route::get('admin/news/add','dashboardController@newsAdd');

// Trang news --------------------

Route::any('{catchall}', 'dashboardController@notfound')->where('catchall', '.*');
