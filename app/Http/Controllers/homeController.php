<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Cookie;
use App\userTable;
use App\couponTable;
use App\mien;
use App\contact;
use App\payment;
use App\gallerytable;
use App\slider;
use App\tinh;
use App\tintucTable;
use App\passenger;
use App\tour;
use App\bill;
use App\schedule;
use App\comment;
use App\comment_tour;
use App\doitacTable;
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
        $showOneNews=tintucTable::join('user','news.id_user','=','user.id_user')->orderby('id_news','desc')->limit(4)->get();
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
      if(isset($_GET['email'])) {
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
    public function checkoutOne(Request $request) {
        $showT=tour::find($request->id_tour);
        $quantity=array(
            'qty_adult'=>$request->adult_number,
            'qty_child'=>$request->child_number
        );
      return view('front-end/pages/checkout/form-checkout',['showT'=>$showT,'qty'=>$quantity]);
    }
    public function checkoutTwo(Request $request) {
        $showT=tour::find($request->id_tour);
        $showBill=$request;
        if ($request->id_coupon) {
           $id_coupon=$request->id_coupon;
        }else{
            $id_coupon=0;
        }
        $data = array(
            'id_tour' => $request->id_tour,
            'id_user' => session('account')->id_user,
            'id_coupon' => $id_coupon,
            'quantity_adults' => $request->quantity_adults,
            'quantity_children' => $request->quantity_children,
            'note' => $request->note,
            'total_price' => ($showT->price_children*$request->quantity_children)+($showT->price*$request->quantity_adults),

        );
        bill::create($data);
      return view('front-end/pages/checkout/form-detail-checkout',['showBill'=>$showBill,'showT'=>$showT]);
    }
    public function checkoutThree() {
        $showPayment=payment::all();
        $showT=bill::orderby('id_bill','desc')->join('tours','bill.id_tour','=','tours.id_tour')->limit(1)->first();
      return view('front-end/pages/checkout/pay-checkout',['showT'=>$showT,'showPayment'=>$showPayment]);
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
    public function partnersDetail($id) {
      $showToursTotal = tour::join('doitac','doitac.id_doitac','=','tours.id_doitac')
          ->join('mien','mien.id_mien','=','tours.id_mien')
          ->join('tinh','tinh.id_tinh','=','tours.id_tinh')
          ->orderby('date_start','asc')
          ->whereRaw("Date(date_start) >= CURDATE() and tours.id_doitac = $id")
          ->get();
      $showToursLimit= tour::join('doitac','doitac.id_doitac','=','tours.id_doitac')
          ->join('mien','mien.id_mien','=','tours.id_mien')
          ->join('tinh','tinh.id_tinh','=','tours.id_tinh')
          ->orderby('date_start','asc')
          ->whereRaw("Date(date_start) >= CURDATE() and tours.id_doitac = $id")
          ->limit(12)
          ->get();
      $infoPartner = doitacTable::join('user','user.id_doitac','=','doitac.id_doitac')
          ->select('doitac.*','user.url_avatar','user.role')
          ->where('doitac.id_doitac','=', $id)
          ->first();
      if(isset($_GET['page'])) {
      $gioihansp = ($_GET['page'] - 1) * 12;
      $showToursLimit= tour::join('doitac','doitac.id_doitac','=','tours.id_doitac')
          ->join('mien','mien.id_mien','=','tours.id_mien')
          ->join('tinh','tinh.id_tinh','=','tours.id_tinh')
          ->orderby('date_start','asc')
          ->whereRaw("Date(date_start) >= CURDATE() and tours.id_doitac = $id")
          ->offset($gioihansp)
          ->limit(12)
          ->get();
      }
      return view('front-end/pages/partners/partners-detail',['infoPartner'=>$infoPartner,'showToursTotal'=>$showToursTotal,'showToursLimit'=>$showToursLimit]);
    }
    public function tours() {
      $showToursTotal = tour::join('doitac','doitac.id_doitac','=','tours.id_doitac')
          ->join('mien','mien.id_mien','=','tours.id_mien')
          ->join('tinh','tinh.id_tinh','=','tours.id_tinh')
          ->orderby('date_start','asc')
          ->whereRaw('Date(date_start) >= CURDATE()')
          ->get();
      $showToursLimit= tour::join('doitac','doitac.id_doitac','=','tours.id_doitac')
          ->join('mien','mien.id_mien','=','tours.id_mien')
          ->join('tinh','tinh.id_tinh','=','tours.id_tinh')
          ->orderby('date_start','asc')
          ->whereRaw('Date(date_start) >= CURDATE()')
          ->limit(12)
          ->get();
      if(isset($_GET['page'])) {
        $gioihansp = ($_GET['page'] - 1) * 12;
        $showToursLimit= tour::join('doitac','doitac.id_doitac','=','tours.id_doitac')
          ->join('mien','mien.id_mien','=','tours.id_mien')
          ->join('tinh','tinh.id_tinh','=','tours.id_tinh')
          ->orderby('date_start','asc')
          ->whereRaw('Date(date_start) >= CURDATE()')
          ->offset($gioihansp)
          ->limit(12)
          ->get();
      }
      $showComment = comment_tour::all();
      return view('front-end/pages/tours/tours',['showComment'=>$showComment, 'showToursTotal'=>$showToursTotal, 'showToursLimit'=>$showToursLimit]);
    }
    public function toursDetail($id) {
      $toursDetail = tour::join('mien','mien.id_mien','=','tours.id_mien')
          ->join('tinh','tinh.id_tinh','=','tours.id_tinh')
          ->where('id_tour', '=' , $id)
          ->first();
      $schedule = schedule::where('id_tour','=', $id)->first() ;
      $infoPartner = doitacTable::join('user','user.id_doitac','=','doitac.id_doitac')
          ->select('doitac.*','user.url_avatar','user.role')
          ->where([['user.role','=','1'],['doitac.id_doitac','=', $toursDetail->id_doitac]])
          ->first();
      $showComment=comment_tour::join('user','user.id_user','=','comment_tour.id_user')
          ->select('user.url_avatar','user.name','comment_tour.created_at','comment_tour.content','comment_tour.rating')
          ->where('comment_tour.id_tour','=',$id)
          ->orderby('id_comment_tour','desc')
          ->get();
      $showCommentLimit=comment_tour::join('user','user.id_user','=','comment_tour.id_user')
          ->select('user.url_avatar','user.name','comment_tour.created_at','comment_tour.content','comment_tour.rating')
          ->where('comment_tour.id_tour','=',$id)
          ->orderby('id_comment_tour','desc')
          ->limit(4)
          ->get();
      return view('front-end/pages/tours/tours-detail', ['t' => $toursDetail, 'schedule' => $schedule,'infoPartner'=>$infoPartner,'showComment'=>$showComment,'showCommentLimit'=>$showCommentLimit]);
    }
    public function searchNews() {
      if($_GET && $_GET['keyword']) {
        $keyword = trim(htmlspecialchars(addslashes($_GET['keyword'])));
        $showMien=mien::all();
        $showTinh=tinh::all();
        $showNewsTotal=tintucTable::join('user','news.id_user','=','user.id_user')->select('news.*','user.name','user.url_avatar')->where('news.title', 'LIKE', '%' . mb_strtolower($keyword, 'UTF-8') . '%')->orWhere('news.short_content', 'LIKE', '%' . mb_strtolower($keyword, 'UTF-8') . '%')->get();
        $showNewsLimit=tintucTable::join('user','news.id_user','=','user.id_user')->select('news.*','user.name','user.url_avatar')->where('news.title', 'LIKE', '%' . mb_strtolower($keyword, 'UTF-8') . '%')->orWhere('news.short_content', 'LIKE', '%' . mb_strtolower($keyword, 'UTF-8') . '%')->limit(6)->get();
        $showNewsHighlights=tintucTable::orderby('id_news','desc')->limit(3)->get();
        return view('front-end/pages/news/news',['showNewsTotal'=>$showNewsTotal,'showNewsLimit'=>$showNewsLimit,'showNewsHighlights'=>$showNewsHighlights,'showMien'=>$showMien,'showTinh'=>$showTinh]);
      }
      return redirect('tin-tuc');
    }
    public function news() {
      $showMien=mien::all();
      $showTinh=tinh::all();
      $showNewsTotal=tintucTable::join('user','news.id_user','=','user.id_user')
          ->select('news.*','user.name','user.url_avatar')
          ->get();
      $showNewsLimit=tintucTable::join('user','news.id_user','=','user.id_user')
          ->select('news.*','user.name','user.url_avatar')
          ->limit(6)
          ->get();
      $showNewsHighlights=tintucTable::orderby('id_news','desc')
          ->limit(3)
          ->get();
      $showComment = comment::all();
      return view('front-end/pages/news/news',['showComment'=>$showComment,'showNewsTotal'=>$showNewsTotal,'showNewsLimit'=>$showNewsLimit,'showNewsHighlights'=>$showNewsHighlights,'showMien'=>$showMien,'showTinh'=>$showTinh]);
    }
    public function newsDetail($id) {
        $showMien=mien::all();
        $showTinh=tinh::all();
        $showNewsHighlights=tintucTable::orderby('id_news','desc')
            ->limit(3)
            ->get();
        $showOneNew=tintucTable::join('user','news.id_user','=','user.id_user')
                ->select('news.*','user.name','user.url_avatar')
            ->find($id);
        tintucTable::where('id_news','=',$id)->update(['views'=> tintucTable::raw('views+1')]);
        $showComment=comment::join('user','comment.id_user','=','user.id_user')
            ->select('user.url_avatar','user.name','comment.created_at','comment.content','comment.rating')
            ->where('comment.id_news','=',$id)
            ->orderby('id_comment','desc')
            ->get();
        $showCommentLimit=comment::leftJoin('user','comment.id_user','=','user.id_user')
            ->select('user.url_avatar','user.name','comment.created_at','comment.content','comment.rating')
            ->where('comment.id_news','=',$id)
            ->orderby('id_comment','desc')
            ->limit(4)
            ->get();
      return view('front-end/pages/news/news-detail',['showOneNew'=>$showOneNew,'showMien'=>$showMien,'showTinh'=>$showTinh,'showNewsHighlights'=>$showNewsHighlights,'showComment'=>$showComment,'showCommentLimit'=>$showCommentLimit]);
    }
    public function gallery() {
      return view('front-end/pages/gallery');
    }
}
