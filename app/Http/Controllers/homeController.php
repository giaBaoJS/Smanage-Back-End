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
use App\comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class homeController extends Controller
{
    // HOME
    public function index()
    {
        $showSlider=slider::orderby('id_slider','desc')->limit(2)->get();
        $showOneNews=tintucTable::join('user','news.id_user','=','user.id_user')->orderby('id_news','desc')->limit(2)->get();
        $showMien=mien::all();
        return view('front-end/home',['showMien'=>$showMien,'showOneNews'=>$showOneNews,'showSlider'=>$showSlider]);
    }
    // PAGE 404 ---------------------------------->
    public function notfound()
    {
        return view('front-end/pages/404');
    }
    // AUTH
    public function login() {
      if(Session::has('account')) {
        return redirect('/');
      }
      if($_GET && $_GET['email']) {
        $email = $_GET['email'];
        $user = userTable::where('email', '=', $email)->first();
        if($user && $user->active === -1) {
          $user = userTable::where('email', '=', $email)->update(['active'=>0]);
        }
      }
      return view('front-end/auth/login');
    }
    public function register() {
       if(Session::has('account')) {
        return redirect('/');
      }
      return view('front-end/auth/register');
    }
    public function changePsw() {
      return view('front-end/auth/change-psw');
    }
    public function forgotPsw() {
      if(Session::has('account')) {
        return redirect('/');
      }
      return view('front-end/auth/forgot-psw');
    }
    public function changeForgotPsw() {
      if($_GET && $_GET['email'] && $_GET['token']) {
        $email = $_GET['email'];
        $token = $_GET['token'];
        $user = userTable::where([['email', '=', $email]])->first();
        $isExpired = $user->expired;
        $isSameToken = Hash::check($token, $user->token);
        if ($isExpired > date('U') || $isSameToken ) {
          return view('front-end/auth/change-forgot-psw');
        } 
        return redirect('/');
      } else {
        return redirect('/');
      }
    }
    public function updateAccount() {
      $user = userTable::where('email', '=', Session::get('account')->email)->first();
      return view('front-end/auth/update', ['user'=>$user]);
    }
    public function history() {
      $bill = tintucTable::join('user','news.id_user','=','user.id_user')->orderby('id_news','desc')->limit(2)->get();
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
      $showMien=mien::all();
      $showTinh=tinh::all();
      $showNewsTotal=tintucTable::join('user','news.id_user','=','user.id_user')->get();
      $showNewsLimit=tintucTable::join('user','news.id_user','=','user.id_user')->limit(6)->get();
      $showNewsHighlights=tintucTable::orderby('id_news','desc')->limit(3)->get();
      return view('front-end/pages/news/news',['showNewsTotal'=>$showNewsTotal,'showNewsLimit'=>$showNewsLimit,'showNewsHighlights'=>$showNewsHighlights,'showMien'=>$showMien,'showTinh'=>$showTinh]);
    }
    public function newsDetail($id) {
        $showMien=mien::all();
        $showTinh=tinh::all();
        $showNewsHighlights=tintucTable::orderby('id_news','desc')->limit(3)->get();
        $showOneNew=tintucTable::join('user','news.id_user','=','user.id_user')->find($id);
        $showComment=comment::leftJoin('user','comment.id_user','=','user.id_user')->where('comment.id_news','=',$id)->orderby('id_comment','desc')->get();
        $showCommentLimit=comment::leftJoin('user','comment.id_user','=','user.id_user')->where('comment.id_news','=',$id)->orderby('id_comment','desc')->limit(4)->get();
      return view('front-end/pages/news/news-detail',['showOneNew'=>$showOneNew,'showMien'=>$showMien,'showTinh'=>$showTinh,'showNewsHighlights'=>$showNewsHighlights,'showComment'=>$showComment,'showCommentLimit'=>$showCommentLimit]);
    }
    public function gallery() {
      return view('front-end/pages/gallery');
    }
}
