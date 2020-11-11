<?php

namespace App\Http\Controllers;
use App\UserTable;
use App\contact;
use App\couponTable;
use App\doitacTable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Mail;
use Session;
use Illuminate\Support\Facades\Auth;
class apiDashboard extends Controller
{
    function addAccount(Request $request)
    {
        $getEmail=UserTable::where('email','=',$request->email)->get();
        if (count($getEmail)>0) {
            return 1;
        }else{
            $data=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'phone'=>$request->phone,
                'address'=>$request->address,
            ];
            UserTable::create($data);
            return 0;
        }
    }
    public function loginLock(Request $request)
    {

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            if (Auth::check()) {
                if (Auth::check()) {
                    session(['account' => Auth::user()]);
                    return 1;
                }
            }
        } else {
            return 0;
        }
    }
// ----contact
    public function deleteContact($id)
    {
        contact::find($id)->delete();
        return 1;
    }
// ----contact
    public function oneCounpon($id)
    {
        if (session('account')->role==1) {
        $showOneCoupon=couponTable::join('doitac', 'coupon.id_doitac', '=', 'doitac.id_doitac')->where('coupon.id_coupon','=',$id)->first();
        }else{
        $showOneCoupon=couponTable::join('user', 'coupon.id_user', '=', 'user.id_user')->where('coupon.id_coupon','=',$id)->first();
        }
        return $showOneCoupon;
    }
//------Đối tác
    public function doiTac()
    {
        $showDoitac=doitacTable::all();
        return response($showDoitac,200);
    }

//---add user
    public function addUser(Request $request)
    {
        $getEmail=UserTable::where('email','=',$request->email)->get();
        if (count($getEmail)>0) {
            return 1;
        }else{
            $data=[
                'id_doitac'=>$request->id_doitac,
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'phone'=>$request->phone,
                'address'=>$request->address,
                'gender'=>$request->gender,
                'role'=>$request->role,
                'active'=>$request->active,
            ];
            UserTable::create($data);
            return 0;
        }
    }
    public function returnLogin(Request $request)
    {
        Auth::logout();
        $request->session('account')->flush();
        $email = Cookie::forget('email');
        $password = Cookie::forget('password');
        return response()->json([
            "message"=>"logout"
        ],201)->withCookie($email)->withCookie($password);
    }
    public function setPremium()
    {
        if (session('account')) {
            $dayEnd = strtotime( Carbon::now());
            $dayStart =strtotime(session('account')->created_at);
            $dayDiff=floor(($dayEnd-$dayStart)/(60*60*24));
            if ($dayDiff>=7) {
                $user=UserTable::find(session('account')->id_user);
                $user->active=0;
                $user->created_at=session('account')->created_at;
                $user->save();
            }
        }
    }
    // coupon -----------------

    public function delCoupon($id)
    {
        couponTable::find($id)->delete();
        return 1;
    }

    // coupon -----------------
}




