<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function login(){
        return view('admin/auth/login');
    }
    public function index(){
        return view('admin/page/home');
    }

    // Page404 ---------------------------------->

    public function notfound(){
        return view('admin/page/page404');
    }

    // Page404 ---------------------------------->

    // ===========================================================

    // contact table ---------------------------------->

    public function contactTable(){
        return view('admin/page/contact/contact-table');
    }

    // contact table ---------------------------------->

    // ===========================================================

    // coupon table ---------------------------------->

    public function couponTable(){
        return view('admin/page/coupon/coupon-table');
    }

    public function couponAdd(){
        return view('admin/page/coupon/coupon-add');
    }

    // coupon table ---------------------------------->

    // user table ---------------------------------->

       public function userTable(){
        return view('admin/page/user/user-table');
    }

    // user table ---------------------------------->

    // ===========================================================

    // coupon table ---------------------------------->

    public function mienTable(){
        return view('admin/page/mien/mien-table');
    }

    public function mienAdd(){
        return view('admin/page/mien/mien-add');
    }

    // coupon table ---------------------------------->

    // tinhthanh table ---------------------------------->

    public function tinhthanhTable(){
        return view('admin/page/tinhthanh/tinhthanh-table');
    }

    public function tinhthanhAdd(){
        return view('admin/page/tinhthanh/tinhthanh-add');
    }

    // tinhthanh table ---------------------------------->

    // tour table ---------------------------------->

    public function toursTable(){
        return view('admin/page/tours/tours-table');
    }

    public function toursAdd(){
        return view('admin/page/tours/tours-add');
    }

    // tour table ---------------------------------->

    // bill table ---------------------------------->

     public function billTable(){
        return view('admin/page/bill/bill-table');
    }

    // bill table ---------------------------------->

    // new table ---------------------------------->

    public function newsTable(){
        return view('admin/page/news/news-table');
    }

    public function newsAdd(){
        return view('admin/page/news/news-add');
    }

    // tour table ---------------------------------->

}
