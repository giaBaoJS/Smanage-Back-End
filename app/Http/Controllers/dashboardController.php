<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Cookie;
use App\userTable;
use App\couponTable;
use App\contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class dashboardController extends Controller
{
    public function login()
    {
        if (session('account')) {
            return redirect('admin/dashboard');

        }else{
            return view('admin/auth/login');
        }

    }

    public function loginCms(Request $request)
    {

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            if (Auth::check()) {
                if (Auth::check()) {
                    session(['account' => Auth::user()]);
                    if ($request->checkbox == "true") {
                        Cookie::queue('email', $request->email, 1000);
                        Cookie::queue('password', $request->password, 1000);
                    } else {
                        $email = Cookie::forget('email');
                        $password = Cookie::forget('password');
                        return redirect('admin/dashboard')->withCookie($email)->withCookie($password);
                    }
                    echo 1;
                }
            }
        } else {
            echo 0;
        }
    }

    // register ---------------------------------->

    public function register()
    {
        return view('admin/auth/register');
    }

    // register ---------------------------------->

    // lockScreen ---------------------------------->

    public function lockScreen(Request $request)
    {
        if (session('account')) {
            $email=session('account')->email;
            $name=session('account')->name;
            Cookie::queue('emailLock',$email , 10);
            Cookie::queue('nameLock', $name, 10);
            Auth::logout();
            $request->session('account')->flush();
        }
        return view('admin/auth/lockScreen');
    }

    // lockScreen ---------------------------------->
    // recover ---------------------------------->

    public function recoverpw()
    {
        return view('admin/auth/recover-pw');
    }

    // recover ---------------------------------->

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session('account')->flush();
        $emailLock = Cookie::forget('emailLock');
        $nameLock = Cookie::forget('nameLock');
        return redirect('/admin')->withCookie($emailLock)->withCookie($nameLock);
    }
    public function index()
    {
        return view('admin/page/home');
    }

    // Page404 ---------------------------------->
    public function notfound()
    {
        return view('admin/page/page404');
    }
    public function errorActive(Request $request)
    {

        return view('admin/page/error-noactive');
    }

    // Page404 ---------------------------------->

    // ===========================================================

    // contact table ---------------------------------->

    public function contactTable()
    {
        $showContact=contact::all();
        return view('admin/page/contact/contact-table',['ShowContact'=>$showContact]);
    }

    // contact table ---------------------------------->


    // ===========================================================

    // coupon table ---------------------------------->

    public function couponTable()
    {

        $showCouponDoiTac=couponTable::join('doitac', 'coupon.id_doitac', '=', 'doitac.id_doitac')->where('coupon.id_doitac','=',session('account')->id_doitac)->get();
        $showCoupon=couponTable::join('user', 'coupon.id_user', '=', 'user.id_user')->get();
        return view('admin/page/coupon/coupon-table',['showCoupon'=>$showCoupon,'showCouponDoiTac'=>$showCouponDoiTac]);
    }
    public function editFormCoupon($id)
    {
        $showCouponOne=couponTable::find($id);
        return view('admin/page/coupon/coupon-edit',['showCouponOne'=>$showCouponOne]);
    }
    public function activeCoupon(Request $request,$id)
    {
        $coupon=couponTable::find($id);
        $coupon->status=1;
        $coupon->save();
        return redirect('/admin/coupon');
    }
    public function editCoupon(Request $request,$id)
    {
        $coupon=couponTable::find($id);
        $coupon->code_coupon=$request->code_coupon;
        $coupon->price=$request->price;
        $coupon->date_start=$request->date_start;
        $coupon->quantity=$request->quantity;
        $coupon->save();
        return redirect('/admin/coupon');
    }
    public function delCoupon(Request $request,$id)
    {
        $coupon=couponTable::find($id);
        $coupon->status=0;
        $coupon->save();
        return redirect('/admin/coupon');
    }

    public function couponAdd()
    {
        return view('admin/page/coupon/coupon-add');
    }

    public function addCoupon(Request $request)
    {
        $data = array(
            'id_user' => $request->id_user,
            'id_doitac' => $request->id_doitac,
            'code_coupon' => $request->code_coupon,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'date_start' => $request->date_start,

        );
        couponTable::create($data);
        return redirect('/admin/coupon');
    }

    // coupon table ---------------------------------->

    // user table ---------------------------------->

    public function userTable()
    {
        $showUser=userTable::all();
        return view('admin/page/user/user-table',['showUser'=>$showUser]);
    }
    public function addUser()
    {
        return view('admin/page/user/user-add');
    }
    // user table ---------------------------------->

    // ===========================================================

    // coupon table ---------------------------------->

    public function mienTable()
    {
        return view('admin/page/mien/mien-table');
    }

    public function mienAdd()
    {
        return view('admin/page/mien/mien-add');
    }

    // coupon table ---------------------------------->

    // tinhthanh table ---------------------------------->

    public function tinhthanhTable()
    {
        return view('admin/page/tinhthanh/tinhthanh-table');
    }

    public function tinhthanhAdd()
    {
        return view('admin/page/tinhthanh/tinhthanh-add');
    }

    // tinhthanh table ---------------------------------->

    // tour table ---------------------------------->

    public function toursTable()
    {
        return view('admin/page/tours/tours-table');
    }

    public function toursAdd()
    {
        return view('admin/page/tours/tours-add');
    }

    // tour table ---------------------------------->

    // bill table ---------------------------------->

    public function billTable()
    {
        return view('admin/page/bill/bill-table');
    }

    // bill table ---------------------------------->

    // new table ---------------------------------->

    public function newsTable()
    {
        return view('admin/page/news/news-table');
    }

    public function newsAdd()
    {
        return view('admin/page/news/news-add');
    }

    // tour table ---------------------------------->
    public function errorTruycap()
    {
        return view('admin/page/error');
    }
}
