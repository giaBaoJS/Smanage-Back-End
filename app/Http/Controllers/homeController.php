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
use App\like_table;
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
  public $showMien;
  function __construct()
  {
    $this->showMien = mien::all();
  }
  // HOME
  public function index()
  {

    $showTinh = tinh::all();
    $showSlider = slider::orderby('id_slider', 'desc')->limit(2)->get();
    $showOneNews = tintucTable::join('user', 'news.id_user', '=', 'user.id_user')->orderby('id_news', 'desc')->limit(4)->get();
    $showToursLimit = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
      ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->orderby('date_start', 'asc')
      ->whereRaw('Date(date_start) >= CURDATE()')
      ->limit(12)
      ->get();
    $showToursSale = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
      ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->orderby('date_start', 'asc')
      ->whereRaw('Date(date_start) >= CURDATE() and tours.discount > 0')
      ->limit(4)
      ->get();

    return view('front-end/home', ['showTinh' => $showTinh, 'showMien' => $this->showMien, 'showToursLimit' => $showToursLimit, 'showToursSale' => $showToursSale, 'showOneNews' => $showOneNews, 'showSlider' => $showSlider]);
  }
  // PAGE 404 ---------------------------------->
  public function notfound()
  {
    return view('front-end/pages/404', ['showMien' => $this->showMien]);
  }
  // AUTH
  public function login()
  {
    if (Session::has('account')) {
      return redirect('/');
    }
    if (isset($_GET['email'])) {
      $email = $_GET['email'];
      $user = userTable::where('email', '=', $email)->first();
      if ($user && $user->active === -1) {
        $user = userTable::where('email', '=', $email)->update(['active' => 0]);
      }
    }
    return view('front-end/auth/login', ['showMien' => $this->showMien]);
  }
  public function register()
  {
    if (Session::has('account')) {
      return redirect('/');
    }
    return view('front-end/auth/register', ['showMien' => $this->showMien]);
  }
  public function changePsw()
  {
    return view('front-end/auth/change-psw', ['showMien' => $this->showMien]);
  }
  public function forgotPsw()
  {
    if (Session::has('account')) {
      return redirect('/');
    }
    return view('front-end/auth/forgot-psw', ['showMien' => $this->showMien]);
  }
  public function changeForgotPsw()
  {
    if ($_GET && $_GET['email'] && $_GET['token']) {
      $email = $_GET['email'];
      $token = $_GET['token'];
      $user = userTable::where([['email', '=', $email]])->first();
      $isExpired = $user->expired;
      $isSameToken = Hash::check($token, $user->token);
      if ($isExpired > date('U') || $isSameToken) {
        return view('front-end/auth/change-forgot-psw', ['showMien' => $this->showMien]);
      }
      return redirect('/');
    } else {
      return redirect('/');
    }
  }
  public function updateAccount()
  {
    $user = userTable::where('email', '=', Session::get('account')->email)->first();
    return view('front-end/auth/update', ['user' => $user, 'showMien' => $this->showMien]);
  }
  // TÌM LỊCH SỬ ĐẶT TOUR KHI ĐÃ ĐĂNG NHẬP
  public function history()
  {
    $bill = bill::where('id_user', '=', session('account')->id_user)->get();
    return view('front-end/auth/history', ['bill' => $bill, 'showMien' => $this->showMien]);
  }
  public function history2()
  {
    $phone = session('find-history');
    $user = userTable::where('phone', '=', $phone)->first();
    if ($user) {
      $bill = bill::where('id_user', '=', $user->id_user)->get();
      return view('front-end/auth/history', ['bill' => $bill, 'showMien' => $this->showMien]);
    }
    return redirect('/');
  }
  // FORM TÌM TOUR ĐÃ ĐẶT KHI KHÔNG ĐĂNG NHẬP
  public function findHistory()
  {
    return view('front-end/auth/history-form', ['showMien' => $this->showMien]);
  }
  // AUTH - END
  // CHECKOUT
  public function checkoutOne(Request $request)
  {
    $showT = tour::find($request->id_tour);
    $quantity = array(
      'qty_adult' => $request->adult_number,
      'qty_child' => $request->child_number
    );
    return view('front-end/pages/checkout/form-checkout', ['showT' => $showT, 'qty' => $quantity, 'showMien' => $this->showMien]);
  }
  public function checkoutTwo(Request $request)
  {
    $showT = tour::find($request->id_tour);
    $showBill = $request;
    if ($request->id_coupon) {
      $id_coupon = $request->id_coupon;
      $coupon = couponTable::find($request->id_coupon);
      $total = ((100 - $coupon->price) / 100) * (($showT->price_children * $request->quantity_children) + ($showT->price * $request->quantity_adults));
      $coupon->quantity = $coupon->quantity - 1;
      $coupon->save();
    } else {
      $id_coupon = 0;
      $total = ($showT->price_children * $request->quantity_children) + ($showT->price * $request->quantity_adults);
    }
    $data = array(
      'id_tour' => $request->id_tour,
      'id_user' => session('account')->id_user,
      'id_coupon' => $id_coupon,
      'quantity_adults' => $request->quantity_adults,
      'id_doitac' => $request->id_doitac,
      'quantity_children' => $request->quantity_children,
      'note' => $request->note,
      'total_price' => $total,
    );
    bill::create($data);
    $kt = array(
      'checkBill' => 1,
    );
    session(['stepBill' => $kt]);
    return view('front-end/pages/checkout/form-detail-checkout', ['showBill' => $showBill, 'showT' => $showT, 'showMien' => $this->showMien]);
  }
  public function checkoutThree()
  {
    if (session('stepCheckout')) {
      $showPayment = payment::all();
      $showT = bill::orderby('id_bill', 'desc')->join('tours', 'bill.id_tour', '=', 'tours.id_tour')->limit(1)->first();
      return view('front-end/pages/checkout/pay-checkout', ['showT' => $showT, 'showPayment' => $showPayment, 'showMien' => $this->showMien]);
    } else {
      return redirect('/tours');
    }
  }
  public function checkoutFour(Request $request)
  {
    if (session('stepCheckout')) {
      $request->session()->forget('stepCheckout');
      $request->session()->forget('stepBill');
      return view('front-end/pages/checkout/finish-checkout', ['showMien' => $this->showMien]);
    } else {
      return redirect('/tours');
    }
  }
  // CHECKOUT - END

  public function about()
  {
    return view('front-end/pages/about', ['showMien' => $this->showMien]);
  }
  public function contact()
  {
    return view('front-end/pages/contact', ['showMien' => $this->showMien]);
  }

  //START PARTNERS
  public function partners()
  {
    return view('front-end/pages/partners/partners', ['showMien' => $this->showMien]);
  }
  public function partnersResignDemo()
  {
    return view('front-end/pages/partners/partners-resign-demo', ['showMien' => $this->showMien]);
  }
  public function partnersResign()
  {
    return view('front-end/pages/partners/partners-resign', ['showMien' => $this->showMien]);
  }
  public function partnersCheckout()
  {
    return view('front-end/pages/partners/partners-checkout', ['showMien' => $this->showMien]);
  }
  public function partnersDetail($id)
  {
    $showToursTotal = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
      ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->orderby('date_start', 'asc')
      ->whereRaw("Date(date_start) >= CURDATE() and tours.id_doitac = $id")
      ->get();
    $showToursLimit = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
      ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->orderby('date_start', 'asc')
      ->whereRaw("Date(date_start) >= CURDATE() and tours.id_doitac = $id")
      ->limit(12)
      ->get();
    $infoPartner = doitacTable::join('user', 'user.id_doitac', '=', 'doitac.id_doitac')
      ->select('doitac.*', 'user.url_avatar', 'user.role')
      ->where('doitac.id_doitac', '=', $id)
      ->first();
    if (isset($_GET['page'])) {
      $gioihansp = ($_GET['page'] - 1) * 12;
      $showToursLimit = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
        ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
        ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
        ->orderby('date_start', 'asc')
        ->whereRaw("Date(date_start) >= CURDATE() and tours.id_doitac = $id")
        ->offset($gioihansp)
        ->limit(12)
        ->get();
    }
    return view('front-end/pages/partners/partners-detail', ['showMien' => $this->showMien, 'showMien' => $this->showMien, 'infoPartner' => $infoPartner, 'showToursTotal' => $showToursTotal, 'showToursLimit' => $showToursLimit]);
  }
  public function checkOutPart()
  {
    $showPayment = payment::all();
    return view('front-end/pages/partners/partners-checkout', ['showMien' => $this->showMien, 'showMien' => $this->showMien, 'showPayment' => $showPayment]);
  }
  //END Part
  public function tours()
  {
    $showComment = comment_tour::all();
    $showTinh = tinh::all();
    $showToursTotal = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
      ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->orderby('date_start', 'asc')
      ->whereRaw('Date(date_start) >= CURDATE()')
      ->get();
    $showToursLimit = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
      ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->orderby('date_start', 'asc')
      ->whereRaw('Date(date_start) >= CURDATE()')
      ->limit(12)
      ->get();
    if (isset($_GET['page'])) {
      $gioihansp = ($_GET['page'] - 1) * 12;
      $showToursLimit = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
        ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
        ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
        ->orderby('date_start', 'asc')
        ->whereRaw('Date(date_start) >= CURDATE()')
        ->offset($gioihansp)
        ->limit(12)
        ->get();
    }

    return view('front-end/pages/tours/tours', ['showMien' => $this->showMien, 'showTinh' => $showTinh, 'showComment' => $showComment, 'showToursTotal' => $showToursTotal, 'showToursLimit' => $showToursLimit]);
  }
  public function toursSearch($id)
    {
        if ($id==1) {
            $showTour=tour::join('mien','mien.id_mien','=','tours.id_mien')
            ->join('tinh','tinh.id_tinh','=','tours.id_tinh')->orderby('price','asc')->whereRaw('Date(date_start) >= CURDATE()')
            ->paginate(6);
        }
        if ($id==2) {
            $showTour=tour::join('mien','mien.id_mien','=','tours.id_mien')
            ->join('tinh','tinh.id_tinh','=','tours.id_tinh')->orderby('price','desc')->whereRaw('Date(date_start) >= CURDATE()')
            ->paginate(6);
        }
        if ($id==3) {
            $showTour=tour::join('mien','mien.id_mien','=','tours.id_mien')
            ->join('tinh','tinh.id_tinh','=','tours.id_tinh')->orderby('id_tour','desc')->whereRaw('Date(date_start) >= CURDATE()')
            ->paginate(6);
        }
        $showComment = comment_tour::all();
        $showTinh = tinh::all();
        $showToursTotal = tour::join('doitac','doitac.id_doitac','=','tours.id_doitac')
        ->join('mien','mien.id_mien','=','tours.id_mien')
        ->join('tinh','tinh.id_tinh','=','tours.id_tinh')
        ->orderby('date_start','asc')
        ->whereRaw('Date(date_start) >= CURDATE()')
        ->get();
        return view('front-end/pages/tours/tours',['showMien'=>$this->showMien,'showTinh'=>$showTinh,'showComment'=>$showComment, 'showToursTotal'=>$showToursTotal, 'showToursLimit'=>$showTour]);
    }
  public function toursByMien($id)
  {
    $showComment = comment_tour::all();
    $showTinh = tinh::all();
    $showToursTotal = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
      ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->select('mien.name_mien', 'tinh.name_tinh', 'tours.*')
      ->orderby('date_start', 'asc')
      ->whereRaw('Date(date_start) >= CURDATE() and tours.id_mien=' . $id)
      ->get();
    $showToursLimit = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
      ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->select('mien.name_mien', 'tinh.name_tinh', 'tours.*')
      ->orderby('date_start', 'asc')
      ->whereRaw('Date(date_start) >= CURDATE() and tours.id_mien=' . $id)
      ->get();
    if (isset($_GET['page'])) {
      $gioihansp = ($_GET['page'] - 1) * 12;
      $showToursLimit = tour::join('doitac', 'doitac.id_doitac', '=', 'tours.id_doitac')
        ->join('mien', 'mien.id_mien', '=', 'tours.id_mien')
        ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
        ->orderby('date_start', 'asc')
        ->whereRaw('Date(date_start) >= CURDATE() and tours.id_mien = ' . $id)
        ->offset($gioihansp)
        ->limit(12)
        ->get();
    }
    return view('front-end/pages/tours/tours-by-mien', ['showMien' => $this->showMien, 'showTinh' => $showTinh, 'showComment' => $showComment, 'showToursTotal' => $showToursTotal, 'showToursLimit' => $showToursLimit]);
  }
  public function toursDetail($id)
  { 
    $like = like_table::where([['id_tn','=',$id],['type','=','1']])->get();
    $toursDetail = tour::join('mien', 'mien.id_mien', '=', 'tours.id_mien')
      ->join('tinh', 'tinh.id_tinh', '=', 'tours.id_tinh')
      ->where('id_tour', '=', $id)
      ->first();
    $schedule = schedule::where('id_tour', '=', $id)->first();
    $infoPartner = doitacTable::join('user', 'doitac.id_doitac', '=', 'user.id_doitac')
      ->select('doitac.name', 'user.url_avatar')
      ->where('doitac.id_doitac', '=', $toursDetail->id_doitac)
      ->first();
    $showComment = comment_tour::join('user', 'user.id_user', '=', 'comment_tour.id_user')
      ->select('user.url_avatar', 'user.name', 'comment_tour.created_at', 'comment_tour.content', 'comment_tour.rating')
      ->where('comment_tour.id_tour', '=', $id)
      ->orderby('id_comment_tour', 'desc')
      ->get();
    $showCommentLimit = comment_tour::join('user', 'user.id_user', '=', 'comment_tour.id_user')
      ->select('user.url_avatar', 'user.name', 'comment_tour.created_at', 'comment_tour.content', 'comment_tour.rating')
      ->where('comment_tour.id_tour', '=', $id)
      ->orderby('id_comment_tour', 'desc')
      ->limit(4)
      ->get();
    return view('front-end/pages/tours/tours-detail', ['like'=>$like,'showMien' => $this->showMien, 't' => $toursDetail, 'schedule' => $schedule, 'infoPartner' => $infoPartner, 'showComment' => $showComment, 'showCommentLimit' => $showCommentLimit]);
  }
  public function searchNews()
  {
    if ($_GET && $_GET['keyword']) {
      $keyword = trim(htmlspecialchars(addslashes($_GET['keyword'])));
      $showMien = mien::all();
      $showTinh = tinh::all();
      $showNewsTotal = tintucTable::join('user', 'news.id_user', '=', 'user.id_user')->select('news.*', 'user.name', 'user.url_avatar')->where('news.title', 'LIKE', '%' . mb_strtolower($keyword, 'UTF-8') . '%')->orWhere('news.short_content', 'LIKE', '%' . mb_strtolower($keyword, 'UTF-8') . '%')->get();
      $showNewsLimit = tintucTable::join('user', 'news.id_user', '=', 'user.id_user')->select('news.*', 'user.name', 'user.url_avatar')->where('news.title', 'LIKE', '%' . mb_strtolower($keyword, 'UTF-8') . '%')->orWhere('news.short_content', 'LIKE', '%' . mb_strtolower($keyword, 'UTF-8') . '%')->limit(6)->get();
      $showNewsHighlights = tintucTable::orderby('id_news', 'desc')->limit(3)->get();
      return view('front-end/pages/news/news', ['showMien' => $this->showMien, 'showNewsTotal' => $showNewsTotal, 'showNewsLimit' => $showNewsLimit, 'showNewsHighlights' => $showNewsHighlights, 'showMien' => $showMien, 'showTinh' => $showTinh]);
    }
    return redirect('tin-tuc');
  }
  public function news()
  {
    $showMien = mien::all();
    $showTinh = tinh::all();
    $showNewsTotal = tintucTable::join('user', 'news.id_user', '=', 'user.id_user')
      ->select('news.*', 'user.name', 'user.url_avatar')
      ->get();
    $showNewsLimit = tintucTable::join('user', 'news.id_user', '=', 'user.id_user')
      ->select('news.*', 'user.name', 'user.url_avatar')
      ->limit(6)
      ->get();
    $showNewsHighlights = tintucTable::orderby('id_news', 'desc')
      ->limit(3)
      ->get();
    $showComment = comment::all();
    return view('front-end/pages/news/news', ['showMien' => $this->showMien, 'showComment' => $showComment, 'showNewsTotal' => $showNewsTotal, 'showNewsLimit' => $showNewsLimit, 'showNewsHighlights' => $showNewsHighlights, 'showMien' => $showMien, 'showTinh' => $showTinh]);
  }
  public function newsDetail($id)
  {
    $like = like_table::where([['id_tn','=',$id],['type','=','0']])->get();
    $showMien = mien::all();
    $showTinh = tinh::all();
    $showNewsHighlights = tintucTable::orderby('id_news', 'desc')
      ->limit(3)
      ->get();
    $showOneNew = tintucTable::join('user', 'news.id_user', '=', 'user.id_user')
      ->select('news.*', 'user.name', 'user.url_avatar')
      ->find($id);
    tintucTable::where('id_news', '=', $id)->update(['views' => tintucTable::raw('views+1')]);
    $showComment = comment::join('user', 'comment.id_user', '=', 'user.id_user')
      ->select('user.url_avatar', 'user.name', 'comment.created_at', 'comment.content', 'comment.rating')
      ->where('comment.id_news', '=', $id)
      ->orderby('id_comment', 'desc')
      ->get();
    $showCommentLimit = comment::leftJoin('user', 'comment.id_user', '=', 'user.id_user')
      ->select('user.url_avatar', 'user.name', 'comment.created_at', 'comment.content', 'comment.rating')
      ->where('comment.id_news', '=', $id)
      ->orderby('id_comment', 'desc')
      ->limit(4)
      ->get();
    return view('front-end/pages/news/news-detail', ['like'=>$like,'showMien' => $this->showMien, 'showOneNew' => $showOneNew, 'showMien' => $showMien, 'showTinh' => $showTinh, 'showNewsHighlights' => $showNewsHighlights, 'showComment' => $showComment, 'showCommentLimit' => $showCommentLimit]);
  }
  public function gallery()
  {
    return view('front-end/pages/gallery', ['showMien' => $this->showMien]);
  }
}
