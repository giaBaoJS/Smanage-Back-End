<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Cookie;
use App\userTable;
use App\couponTable;
use App\mien;
use App\contact;
use App\gallerytable;
use App\slider;
use App\tinh;
use App\tintucTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class homeController extends Controller
{
    // HOME
    public function index()
    {
        $showOneNews=tintucTable::join('user','news.id_user','=','user.id_user')->orderby('id_news','desc')->limit(2)->get();
        $showMien=mien::all();
        return view('front-end/home',['showMien'=>$showMien,'showOneNews'=>$showOneNews]);
    }
    // PAGE 404 ---------------------------------->
    public function notfound()
    {
        return view('front-end/pages/404');
    }
    // AUTH
    public function login() {
      return view('front-end/auth/login');
    }
    public function register() {
      return view('front-end/auth/register');
    }
    public function changePsw() {
      return view('front-end/auth/change-psw');
    }
    public function forgotPsw() {
      return view('front-end/auth/forgot-psw');
    }
    public function updateAccount() {
      return view('front-end/auth/update');
    }
    public function history() {
      return view('front-end/auth/history');
    }
    // AUTH - END
    // CHECKOUT 
    public function checkoutOne() {
      return view('front-end/pages/checkout/form-checkout');
    }
    public function checkoutTwo() {
      return view('front-end/pages/checkout/form-detail-checkout');
    }
    public function checkoutThree() {
      return view('front-end/pages/checkout/pay-checkout');
    }
    public function checkoutFour() {
      return view('front-end/pages/checkout/finish-checkout');
    }
    // CHECKOUT - END
    public function about() {
      return view('front-end/pages/about');
    }
    public function contact() {
      return view('front-end/pages/contact');
    }
    public function partners() {
      return view('front-end/pages/partners/partners');
    }
    public function partnersDetail() {
      return view('front-end/pages/partners/partners-detail');
    }
    public function tours() {
      return view('front-end/pages/tours/tours');
    }
    public function toursDetail() {
      return view('front-end/pages/tours/tours-detail');
    }
    public function news() {
      return view('front-end/pages/news/news');
    }
    public function newsDetail() {
      return view('front-end/pages/news/news-detail');
    }
    public function gallery() {
      return view('front-end/pages/gallery');
    }
   

}
