<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class dashboardController extends Controller
{
    public function login()
    {
        if (session('account')) {
            return redirect('admin/dashboard');
        } else {
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
            $email = session('account')->email;
            $name = session('account')->name;
            Cookie::queue('emailLock', $email, 10);
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
        $showContact = contact::all();
        return view('admin/page/contact/contact-table', ['ShowContact' => $showContact]);
    }

    // contact table ---------------------------------->


    // ===========================================================

    // coupon table ---------------------------------->

    public function couponTable()
    {

        $showCouponDoiTac = couponTable::join('doitac', 'coupon.id_doitac', '=', 'doitac.id_doitac')->where('coupon.id_doitac', '=', session('account')->id_doitac)->get();
        $showCoupon = couponTable::join('user', 'coupon.id_user', '=', 'user.id_user')->get();
        return view('admin/page/coupon/coupon-table', ['showCoupon' => $showCoupon, 'showCouponDoiTac' => $showCouponDoiTac]);
    }
    public function editFormCoupon($id)
    {
        $showCouponOne = couponTable::find($id);
        return view('admin/page/coupon/coupon-edit', ['showCouponOne' => $showCouponOne]);
    }
    public function activeCoupon(Request $request, $id)
    {
        $coupon = couponTable::find($id);
        $coupon->status = 1;
        $coupon->save();
        return redirect('/admin/coupon');
    }
    public function editCoupon(Request $request, $id)
    {
        $coupon = couponTable::find($id);
        $coupon->code_coupon = $request->code_coupon;
        $coupon->price = $request->price;
        $coupon->date_start = $request->date_start;
        $coupon->quantity = $request->quantity;
        $coupon->save();
        return redirect('/admin/coupon');
    }
    public function delCoupon(Request $request, $id)
    {
        $coupon = couponTable::find($id);
        $coupon->status = 0;
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
        $showUser = userTable::all();
        return view('admin/page/user/user-table', ['showUser' => $showUser]);
    }
    public function addUser()
    {
        return view('admin/page/user/user-add');
    }
    // user table ---------------------------------->

    // ===========================================================

    // coupon table ---------------------------------->

    public function sliderTable()
    {
        $showSlider = slider::all();
        return view('admin/page/slider/slider-table', ['showSlider' => $showSlider]);
    }

    public function sliderAdd()
    {
        return view('admin/page/slider/slider-add');
    }

    public function addSlider(Request $request)
    {
        $path = '';
        $file = $request->url_img_slider;
        if ($file) {
            $path = $file->getClientOriginalName();
            $file->move('BackEnd/assets/images/slider/', $path);
        }
        $data = array(
            'title' => $request->title,
            'content' => $request->content,
            'url_img_slider' => $path
        );
        slider::create($data);
        return redirect('admin/slider');
    }

    public function delSlider($id)
    {
        $slider = slider::find($id);
        $slider->delete();
        return redirect('admin/slider');
    }

    public function editformSlider(Request $request, $id)
    {
        $slider = slider::find($id);
        return view('admin/page/slider/slider-edit', ['slider' => $slider]);
    }

    public function editSlider(Request $request, $id)
    {
        $slider = slider::find($id);

        $slider->title = $request->title;
        $slider->content = $request->content;
        $path = '';
        $file = $request->url_img_slider;
        if ($file) {
            $path = $file->getClientOriginalName();
            $file->move('BackEnd/assets/images/slider/', $path);
            $slider->url_img_slider = $path;
        }
        $slider->save();
        return redirect('admin/slider');
    }
    // Slider table ------------------------------

    // miền table ------------------------------
    public function mienTable()
    {
        $showMien = mien::all();
        return view('admin/page/mien/mien-table', ['showMien' => $showMien]);
    }

    public function mienAdd()
    {
        return view('admin/page/mien/mien-add');
    }
    public function addMien(Request $request)
    {
        $path = '';
        $file = $request->url_img_mien;
        if ($file) {
            $path = $file->getClientOriginalName();
            $file->move('BackEnd/assets/images', $path);
        }
        $data = array(
            'name_mien' => $request->tenmien,
            'url_img_mien'=>$path
        );
        mien::create($data);

        return redirect('admin/mien');
    }
    public function delMien(Request $request, $id)
    {
        $mien = mien::find($id);
        $mien->delete();
        return redirect('admin/mien');
    }
    public function editFormMien(Request $request, $id)
    {
        $mien = mien::find($id);

        return view('admin/page/mien/mien-edit', ['showMien' => $mien]);
    }
    public function editMien(Request $request, $id)
    {
        $mien = mien::find($id);
        $mien->name_mien = $request->tenmien;
        $path = '';
        $file = $request->url_img_mien;
        if ($file) {
            $path = $file->getClientOriginalName();
            $file->move('BackEnd/assets/images', $path);
            $mien->url_img_mien = $path;
        }
        $mien->save();
        return redirect('admin/mien');
    }
    // miền table ------------------------------


    // tinhthanh table ---------------------------------->

    public function tinhthanhTable()
    {
        $showCouponDoiTac = couponTable::join('doitac', 'coupon.id_doitac', '=', 'doitac.id_doitac')
            ->where('coupon.id_doitac', '=', session('account')->id_doitac)->get();

        $showTinh = tinh::all();
        $mien = tinh::join('mien', 'tinh.id_mien', '=', 'mien.id_mien')->first();
        return view('admin/page/tinhthanh/tinhthanh-table', ['showTinh' => $showTinh, 'mien' => $mien]);
    }

    public function tinhthanhAdd()
    {
        $mien = mien::all();
        return view('admin/page/tinhthanh/tinhthanh-add', ['mien' => $mien]);
    }

    public function addTinh(Request $request)
    {
        $data = array(
            'id_mien' => $request->id_mien,
            'name_tinh' => $request->tentinh,
        );
        tinh::create($data);
        return redirect('admin/tinhthanh');
    }

    public function delTinh(Request $request, $id)
    {
        $tinh = tinh::find($id);
        $tinh->delete();
        return redirect('admin/tinhthanh');
    }
    public function editformTinh(Request $request, $id)
    {
        $tinh = tinh::find($id);
        $mien = mien::all();
        return view('admin/page/tinhthanh/tinhthanh-edit', ['tinh' => $tinh, 'mien' => $mien]);
    }
    public function editTinh(Request $request, $id)
    {
        $tinh = tinh::find($id);
        $tinh->name_tinh = $request->tentinh;
        $tinh->id_mien = $request->id_mien;
        $tinh->save();
        return redirect('admin/tinhthanh');
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
        $showNew=tintucTable::join('user','news.id_user','=','user.id_user')->get();
        return view('admin/page/news/news-table',['showNew'=>$showNew]);
    }

    public function newsAdd()
    {
        return view('admin/page/news/news-add');
    }
    public function addNews(Request $request)
    {
        $path = '';
        $file = $request->url_img_news;
        if ($file) {
            $path = $file->getClientOriginalName();
            $file->move('BackEnd/assets/images/news', $path);
        }
        $data=array(
            'title' => $request->title,
            'short_content' => $request->short_content,
            'content' => $request->content,
            'url_img_news'=>$path,
            'id_user'=>$request->id_user
        );
        tintucTable::create($data);
        return redirect('/admin/news');
    }
    public function formEditNew(Request $request,$id)
    {
        $showNewOne=tintucTable::find($id);
        return view('admin/page/news/news-update',['showOneNews'=>$showNewOne]);
    }
    public function editNews(Request $request)
    {
        $showNews=tintucTable::find($request->id_news);
        $showNews->title=$request->title;
        $showNews->short_content=$request->short_content;
        $showNews->content=$request->content;
        $showNews->id_user=$request->id_user;
        $path = '';
        $file = $request->url_img_news;
        if ($file) {
            $path = $file->getClientOriginalName();
            $file->move('BackEnd/assets/images/news', $path);
            $showNews->url_img_news=$path;
        }
        $showNews->save();
        return redirect('/admin/news');
    }
    public function viewsNews($id)
    {
        $showNewOne=tintucTable::find($id);
        return view('admin/page/news/news-details',['showOneNews'=>$showNewOne]);
    }


    // tin tức table ---------------------------------->
    // tour table ---------------------------------->
    public function errorTruycap()
    {
        return view('admin/page/error');
    }
    // gallery--------------

    public function galleryTable()
    {
        $showMien = mien::all();
        $showGallery = gallerytable::join('mien', 'gallery.id_mien', '=', 'mien.id_mien')->orderby('id_gallery','desc')->get();
        return view('admin/page/gallery/gallery-table', ['showmien' => $showMien, 'showGallery' => $showGallery]);
    }
    public function addGallery(Request $request)
    {
        $path = '';
        $file = $request->url_img_gallery;
        if ($file) {
            $path = $file->getClientOriginalName();
            $file->move('BackEnd/assets/images/gallery', $path);
        }
        $data = array(
            'title' => $request->title,
            'id_mien' => $request->id_mien,
            'url_img_gallery'=>$path,
        );
        gallerytable::create($data);
        return redirect('/admin/gallery');
    }
    // gallery--------------
}
